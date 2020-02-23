$("document").ready(function () {
    $('#results').addClass("hidden");

    $(".js-ajax-php-json").submit(function () {
        let data = {
            "action": "live"  // Use either "live" or "test" here as the value.
        };

        data = $(this).serialize() + "&" + $.param(data);

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "response.php", // Relative or absolute path to response.php file
            data: data,
            success: function (data) {
                console.log('data rows: ' + data.length);

                const results = $('#results');
                results.find('.results-table').remove();

                let table = $('<table>').addClass('results-table');

                let monthYearHeader = $('<th>').addClass("month-year").text('Month');
                let numberOfStudiesHeader = $('<th>').addClass("num-studies").text('Daily Studies');
                let ramCostPerDayHeader = $('<th>').addClass("ram-cost").text('RAM Cost per Day');

                let rowHeader = $('<tr>').addClass('month-data');
                rowHeader.append(monthYearHeader);
                rowHeader.append(numberOfStudiesHeader);
                rowHeader.append(ramCostPerDayHeader);
                table.append(rowHeader);

                for (let i=0; i < data.length; i++) {
                    let monthYearData = $('<td>').addClass("month-year").text(data[i].month);
                    let numberOfStudiesData = $('<td>').addClass("num-studies").text(data[i].dailyStudies);
                    let ramCostPerDayData = $('<td>').addClass("ram-cost").text(data[i].ramCostPerDay);

                    let row = $('<tr>').addClass('month-data');
                    row.append(monthYearData);
                    row.append(numberOfStudiesData);
                    row.append(ramCostPerDayData);

                    table.append(row);
                }

                results.append(table);

                // Also, make the results div visible now:
                results.removeClass("hidden");
            }
        });

        return false;
    });
});
