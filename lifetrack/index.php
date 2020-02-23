<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/lifetrack.js" type="text/javascript"></script>

        <title>Lifetrack Medical Systems Tech Evaluation</title>
    </head>
    <body>
        <?php include "includes/header.php"; ?>

        <form class="js-ajax-php-json" method="POST" accept-charset="utf-8">
            <ul>
                <li>
                    <label for="daily-studies">Daily Studies</label>
                    <input name="daily-studies" type="number" id="daily-studies" placeholder="Enter Daily Studies">
                </li>
                <li>
                    <label for="growth-percent">Growth Percent</label>
                    <input name="growth-percent" type="number" id="growth-percent" placeholder="Enter Growth Percent">
                </li>
                <li>
                    <label for="months">Number of Months</label>
                    <input name="months" type="number" id="months" placeholder="Enter No. Months">
                </li>

            </ul>
            <input type="submit" name="submit" value="Submit form"/>
        </form>

        <div id="results" class="hidden">
        </div>

        <?php include "includes/footer.php"; ?>
    </body>
</html>
