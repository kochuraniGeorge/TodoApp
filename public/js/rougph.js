/* <script>
$(document).ready(function() {
    $(".addMoreTasks").click(function() {
        var newRow = $(".tableData:last").clone();
        newRow.find("input").val("");
        $(".addMoreTasks").hide();
        $("table").append(newRow);
    });
});
</script> */


$(document).ready(function() {
    // Hide all .plus buttons except the first one
    $(".plus:not(:first)").hide();

    $(".plus").click(function() {
        var newRow = $(".tableData:last").clone();
        newRow.find("input").val("");
        $("table").append(newRow);

        // Hide the current .plus button
        // $(this).hide();

        // Show the next .plus button
        // $(this).next(".plus").show();
    });
});
