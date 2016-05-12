var ASplugins = {
    init: function () {
        ASplugins.eqHeight();
        ASplugins.chbxInit();
        ASplugins.chosenInit();
        ASplugins.datepickerInit();
        ASplugins.tablesInit();
        ASplugins.sliderInit();
        ASplugins.numberUp();
        ASplugins.rangeUpdate();
        ASplugins.fileStyle();
    },
    eqHeight: function () {
        $('.eqh').matchHeight();
    },
    chbxInit: function () {
        $('input[type="checkbox"], input[type="radio"]').each(function () {
            $(this).prettyCheckable();
        });
    },
    chosenInit: function () {
        $('.chosen-select').chosen({disable_search_threshold: 10});
        $('.chart-select').chosen({disable_search_threshold: 10}).change(function () {
            var opt = $(this).val();
            switch (opt) {
                case "chart-line":
                    clear_space("chart-line");
                    chart_line();
                    break;
                case "chart-pie":
                    clear_space("chart-pie");
                    chart_pie();
                    break;
                case "chart-bar":
                    clear_space("chart-bar");
                    chart_bar();
                    break;
                case "chart-stacked":
                    clear_space("chart-stacked");
                    chart_stacked();
                    break;
            }
        });
    },
    datepickerInit: function () {
        $('.datepicker').each(function () {
            var self = $(this);
            var inp = self.find('input');
            inp.datetimepicker();
        });
    },
    tablesInit: function () {
        $('.datatable').DataTable({
            searching: false,
            info: false,
            "columnDefs": [
                {"orderable": false, "targets": 0}
            ],
            "order": []
        });
    },
    sliderInit: function () {
        $('.bxslider').bxSlider();
    },
    numberUp: function () {
        $('.counter').each(function () {
            $(this).counterUp({
                delay: 10,
                time: 1000
            });
        });
    },
    rangeUpdate: function () {
        $("#inp-range").each(function () {
            var self = $(this);
            self.mbSlider({
                onSlide: function () {
                    self.siblings('input[type="hidden"]').val(self.mbgetVal());
                }
            });
            $(window).on('resize', function () {
                var pos = self.mbgetVal();
                self.mbsetVal(pos);
            });
        });
    },
    fileStyle: function () {
        $('input[type="file"]').each(function () {
            $(this).nicefileinput();
        });
    }
};

$(document).ready(ASplugins.init);