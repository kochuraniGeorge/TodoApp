$(document).ready(function () {
    let rowIndex = 1; // Initialize the row index

    $("#taskTable").on("click", ".plus", function () {
        const $table = $("#taskTable");
        const $template = $table.find(".tableData.template").clone().removeClass("template");//find .tableData.template then clone it and remove template
        $template.show();

        // Update the name attribute for each input in the new row
        $template.find('input[name^="task["]').each(function () {
            const name = $(this).attr("name").replace(/\[\d+\]/g, `[${rowIndex}]`);
            $(this).attr("name", name).val(''); // Clear input values
        });

        $table.append($template); // Append the new row
        rowIndex++; // Increment the row index for the next row
        $table.find(".plus").hide();
        $table.find(".plus").last().show();
        // $(".plus").not(":last").hide();// Hide all previous plus buttons except the last one
    });
})



// $(document).ready(function() {
//     $("table").on("click", ".plus", function(){
//         var newRow = $(".tableData:last").clone();
//         newRow.find("input").val(""); // Clear the input fields
//         newRow.appendTo("table");
//         $(this).hide();
//     });
// });




// $(document).ready(function() {
//     $(".plus").click(function(){
//         $(".tableData:last").clone().appendTo("table");
// })
// });




// $(document).ready(function () {
//     $(".plus").click(function () {
//         alert('here')
//         var $table = $("#taskTable");
//         var $template = $table.find(".tableData.template").clone().removeClass("template");
//         $template.find('input').val(''); // Clear input values in the new row
//         $template.show();
//         $table.append($template);
//     });
// });



// $(document).ready(function() {
//     // Initially hide all .plus buttons except the first one
//     //$(".plus:not(:first)").hide();

//     // Use event delegation to handle click events on .plus buttons
    
//     $(document).on("click", ".plus", function() {
//         $(".plus").click(function(){
        // var newRow = $(".tableData:last").clone();
//         newRow.find("input").val("");
//         $("table").append(newRow);
        
//         // Hide the current .plus button
//        // $(this).hide();
        
//         // Show the next .plus button
//         //$(this).next(".plus").show();
//     });
// });