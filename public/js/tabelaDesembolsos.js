$(document).ready(function () {
    document.title = "Orçamentos CAJ";

    var table = $("#tabela").DataTable({
        dom: '<"table-container"rt><"pagination-container"p>', 
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
        },
        ordering: false, // Desabilita a ordenação
        pageLength: 12,
        paging: true,
        processing: true,
        autoWidth: false,
        buttons: [
            "colvis",
            "excelHtml5",
            
        ],
        initComplete: function (settings, json) {
            // dropdowns
            $("#tabela thead th").each(function (index) {
                var title = $(this).text();
            
                var columnData = table.column(index).data().unique().sort().toArray();
                var dropdownOptions = '<option value="">' + title + '</option>';

                for (var i = 0; i < columnData.length; i++) {
                    dropdownOptions += '<option value="' + columnData[i] + '">' + columnData[i] + '</option>';
                }

                $(this).html('<select class="filter-dropdown" style="width: 100%;z-index=0";justify-content: center;>' + dropdownOptions + '</select>');
                
            });

            // Inicializa os dropdowns com a biblioteca select2
            $(".filter-dropdown").select2();
        }
    });

    // Aplica os filtros quando os dropdowns são alterados
    $(document).on("change", ".filter-dropdown", function () {
        var columnIndex = $(this).parent().index();
        var filterValue = $(this).val();

        table.column(columnIndex).search(filterValue).draw();
    });
});

 