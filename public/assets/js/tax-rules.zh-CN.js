$(document).ready(function () {
    $(".item-add").on("click", function () {

        var sTable = $(".task-items");
        var RowAppend = ['<tr class="item-row">',

            '<td data-label="起始值"><input type="text" name="salary_from[]" class="form-control description' +
            ' salary_from"></td>' +
            '<td data-label="结束值"><input type="text" name="salary_to[]" class="form-control description"></td>' +
            '<td data-label="税率（%）"><input type="text" name="tax_percentage[]" class="form-control description"></td>' +
            '<td data-label="附加税额"><input type="text" name="additional_tax_amount[]" class="form-control' +
            ' description"></td>' +
            '<td data-label="性别"><select name="gender[]" class="form-control selectpicker" data-live-search="true">' +
            '<option value="Both">全部</option>' +
            '<option value="Male">男</option>' +
            '<option value="Female">女</option>' +
            '</select>' +
            '</td>' +

            '<td><button class="btn btn-danger bnt-sm" id="RemoveITEM" type="button"><i class="fa fa-trash-o"></i>' +
            ' 移除</button></td>'


            , "</tr>"].join("");
        var sLookup = $(RowAppend);

        var description = sLookup.find(".description");

        sLookup.find(".selectpicker").selectpicker();


        $(".item-row:last", sTable).after(sLookup);
        $('.salary_from').focus();

        sLookup.find("#RemoveITEM").on("click", function () {

            $(this).parents(".item-row").remove();

            if ($(".item-row").length < 2) $("#deleteRow").hide();
            var e = $(this).closest("tr");

        });

        return false
    });


});

