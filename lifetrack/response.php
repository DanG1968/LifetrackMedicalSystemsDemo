<?php header('Content-type: application/json'); ?>

<?php
require_once "includes/classes/MonthData.php";
require_once "includes/classes/CalculationService.php";

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function is_action_parameter_specified() {
    return isset($_POST["action"]) && !empty($_POST["action"]);
}

function test_function() {
    $return = $_POST;
    $return["json"] = json_encode($return);
    echo json_encode($return);
}

if (is_ajax()) {
    if (is_action_parameter_specified()) { // Checks if action value exists
        $action = $_POST["action"];
        switch ($action) {
            case "test":
                test_function();
                $actionProcessed = true;
                break;
            case "live":
                $monthDataList = CalculationService::getInstance()->computeMonthDataList(
                    (int)$_POST["daily-studies"], (int)$_POST["growth-percent"], (int)$_POST["months"]);
                echo json_encode($monthDataList);
                break;
            default:
                error_log("Unexpected action: $action");
                break;
        }
    }
}
?>
