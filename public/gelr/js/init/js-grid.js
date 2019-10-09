/* ========================================================================

Js Grid Init

=========================================================================
 */


(function($) {
  'use strict';
  $(function() {

    //basic config
    if ($("#js-grid-basic").length) {
      $("#js-grid-basic").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "آیا واقعا می خواهید مشتری را حذف کنید؟",
        data: db.clients,
        fields: [{
            name: "نام",
            type: "text",
            width: 150
          },
          {
            name: "سن",
            type: "number",
            width: 50
          },
          {
            name: "آدرس",
            type: "text",
            width: 200
          },
          {
            name: "کشور",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "نام"
          },
          {
            name: "Married",
            title: "متاهل است",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("custom_checkbox mt-0")
                .append(
                  $("<label>").addClass("custom_check_label")
                  .append(
                    $("<input>").attr("type", "radio")
                    .addClass("custom_check_input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          },
          {
            type: "control"
          }
        ]
      });
    }


    //Static
    if ($("#js-grid-static").length) {
      $("#js-grid-static").jsGrid({
        height: "500px",
        width: "100%",

        sorting: true,
        paging: true,

        data: db.clients,

        fields: [{
            name: "نام",
            type: "text",
            width: 150
          },
          {
            name: "سن",
            type: "number",
            width: 50
          },
          {
            name: "آدرس",
            type: "text",
            width: 200
          },
          {
            name: "کشور",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "نام"
          },
          {
            name: "Married",
            title: "متاهل است",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("custom_checkbox mt-0")
                .append(
                  $("<label>").addClass("custom_check_label")
                  .append(
                    $("<input>").attr("type", "checkbox")
                    .addClass("custom_check_input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          }
        ]
      });
    }

    //sortable
    if ($("#js-grid-sortable").length) {
      $("#js-grid-sortable").jsGrid({
        height: "500px",
        width: "100%",

        autoload: true,
        selecting: false,

        controller: db,

        fields: [{
            name: "نام",
            type: "text",
            width: 150
          },
          {
            name: "سن",
            type: "number",
            width: 50
          },
          {
            name: "آدرس",
            type: "text",
            width: 200
          },
          {
            name: "کشور",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "نام"
          },
          {
            name: "Married",
            title: "متاهل است",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("custom_checkbox mt-0")
                .append(
                  $("<label>").addClass("custom_check_label")
                  .append(
                    $("<input>").attr("type", "checkbox")
                    .addClass("custom_check_input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          }
        ]
      });
    }

    if ($("#sort").length) {
      $("#sort").on("click", function() {
        var field = $("#sortingField").val();
        $("#js-grid-sortable").jsGrid("sort", field);
      });
    }

  });
})(jQuery);