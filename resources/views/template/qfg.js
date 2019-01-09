/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Get element outer html
 * @param {type} s
 * @returns {jQuery|$.fn@call;before@call;remove}
 */
$.fn.outerHTML = function (s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};
/**
 * Name space registration
 * @type Object
 */
var GOKAPITAL_CALCS = GOKAPITAL_CALCS || {};
/**
 * Alpha colors to use in charts
 * @type Array
 */
GOKAPITAL_CALCS.colorsAlpha = ["rgba(0, 167, 208, 0.7)", "rgba(243,
    156, 18, 0.7)", "rgba(221, 75, 57, 0.7)", "rgba(181, 187, 200, 0.7)",
"rgba(0, 166, 90, 0.7)"];
/**
 * Colors to use in charts
 * @type Array
 */
GOKAPITAL_CALCS.colors = ["rgb(0, 167, 208)", "rgb(243, 156, 18)",
    "rgb(221, 75, 57)", "rgb(181, 187, 200)", "rgb(0, 166, 90)"];
/**
 * Options for Area type chart
 * @type type
 */
GOKAPITAL_CALCS.areaChartOptions = {
    maintainAspectRatio: false,
    spanGaps: false,
    tooltips: {
        enabled: true,
        mode: 'single',
        callbacks: {
            label: function (tooltipItems, data) {
                return '$' + $.number(tooltipItems.yLabel, 2, '.', ',');
            }
        }
    },
    elements: {
        line: {
            tension: 0.000001
        }
    },
    plugins: {
        filler: {
            propagate: false
        }
    },
    scales: {
        xAxes: [{
            ticks: {
                autoSkip: true,
                maxTicksLimit: 20,
                maxRotation: 0
            },
            gridLines: {
                color: "rgba(0, 0, 0, 0)"
            },
            scaleLabel: {
                display: true,
                labelString: 'Period'
            }
        }],
        yAxes: [{
            stacked: true,
            gridLines: {
                color: "rgba(0, 0, 0, 0)"
            },
            scaleLabel: {
                display: true,
                labelString: 'Payment'
            },
            ticks: {
                beginAtZero: true,
                userCallback: function (value, index, values) {
                    return '$' + $.number(value, 0, '.', ',');
                }
            }
        }]
    }
};
/**
 * Options for Doughnut type chart
 * @type type
 */
GOKAPITAL_CALCS.doughnutChartOptions = {
    drawTotal: true,
    responsive: true,
    animation: {
        duration: 0,
        animateScale: false,
        animateRotate: false
    },
    tooltips: {
        enabled: true,
        mode: 'single',
        callbacks: {
            label: function (tooltipItems, data) {
                var dataset = data.datasets[tooltipItems.datasetIndex];
                var currentValue = dataset.data[tooltipItems.index];
                return '$' + $.number(currentValue, 0, '.', ',');
            }
        }
    },
    legend: false,
    legendCallback: function (chart) {
        var text = [];
        text.push('<div class="row ' + chart.id + '-legend">');
        for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            var cols = parseInt(12 / chart.data.labels.length);
            text.push('<div class="col-md-' + cols + ' text-center">');
            if (chart.data.labels[i]) {
                text.push('<span style="font-size: 22px; padding: 10px
                0; color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                text.push('$' +
                    $.number(chart.data.datasets[0].data[i], 0, '.', ','));
                text.push('</span><br />');
                text.push('<span style="font-size: 18px; padding: 10px
                0;">' + chart.data.labels[i] + '</span>');
            }
            text.push('</div>');
        }
        text.push('</div>');
        return text.join("");
    }
};
/**
 * Function to add separators in step list
 * @returns void
 */

/**
 * Show and hide elements based in current step and goes to next step
 * @param {String} button
 * @returns void
 */
GOKAPITAL_CALCS.nextStep = function (button) {
    var parent = button.parents('.with-steps');
    var active = parent.find('ul.nav > li.active');
    var next = active.next();
    parent.find('.prev').prop("disabled", true);
    if (next.length) {
        $(next).children('a').tab('show');
        if (next.next().length === 0) {
            button.prop("disabled", true);
            parent.find('.calculate').prop("disabled", false);
        }
    }
};
/**
 * Show and hide elements based in current step and goes to previous step
 * @param {String} button
 * @returns void
 */
GOKAPITAL_CALCS.prevStep = function (button) {
    var parent = button.parents('.with-steps');
    var active = parent.find('ul.nav > li.active');
    var prev = active.prev();
    parent.find('.calculate').prop("disabled", true);
    parent.find('.next').prop("disabled", false);

    if (prev.length) {
        $(prev).children('a').tab('show');
        if (prev.prev().length === 0) {
            button.prop("disabled", true);
            ;
        }
    }
};
/**
 * Show and hide elements based in current step and goes to defined  step
 * @param {String} tab
 * @returns void
 */

$(function () {
    if ($('.with-steps').length === 0) return;
    $('.prev').prop("disabled", true);
    $('.calculate').prop("disabled", true);
});

GOKAPITAL_CALCS.changeStep = function (tab) {
    var parent = tab.parents('.with-steps');
    var prev = tab.parent().prev();
    var next = tab.parent().next();
    if (prev.length === 0) {
        parent.find('.prev').prop("disabled", true);
    } else {
        parent.find('.prev').prop("disabled", false);
    }
    if (next.length === 0) {
        parent.find('.next').prop("disabled", true);
        parent.find('.calculate').prop("disabled", false);
    } else {
        parent.find('.calculate').prop("disabled", true);
        parent.find('.next').prop("disabled", false);
    }
};
/**
 * Calculate the monthly payment for a loan
 * @param {type} rate
 * @param {type} value
 * @param {type} months
 * @returns {Object.monthlyPayment.m|Number}
 */
GOKAPITAL_CALCS.monthlyPayment = function (rate, value, months) {
    var rate_val = rate / 100 / 12;
    var m = value * ((rate_val * Math.pow(1 + rate_val, months)) /
        (Math.pow(1 + rate_val, months) - 1));
    return m;
};
/**
 * Calculate the monthly value from a yearly value checking by a value
 or percentage
 * @param {type} unit
 * @param {type} yearly_value
 * @param {type} value
 * @returns {Number|Object.yearlyToMonthly.monthly_value}
 */
GOKAPITAL_CALCS.yearlyToMonthly = function (unit, yearly_value, value = null) {
    var monthly_value;
    if (parseInt(unit) === 0) {
        monthly_value = parseFloat(yearly_value) / 12;
    } else {
        monthly_value = parseFloat(yearly_value) / 100 * parseFloat(value) / 12;
    }
    return monthly_value;
};
/**
 * Calculate how many months have to pay the PMI insurance
 * @param {type} balance
 * @param {type} value
 * @param {type} percentage
 * @returns {Number|Object.monthsWithPMI.res}
 */
GOKAPITAL_CALCS.monthsWithPMI = function (balance, value, percentage) {
    var req_value = value * percentage / 100;
    var res;
    $.each(balance, function (k, v) {
        if (v <= req_value) {
            res = k - 1;
            return false;
        }
    });
    return res;
};
/**
 * Generate the amortization table a stores it in an array
 * @param {type} rate
 * @param {type} value
 * @param {type} months
 * @returns {Array|GOKAPITAL_CALCS.paymentsTable.table}
 */
GOKAPITAL_CALCS.paymentsTable = function (rate, value, months) {
    var table = {principal: [], interest: [], balance: []};
    var principal = value;
    var monthly_payment = GOKAPITAL_CALCS.monthlyPayment(rate, value, months);
    var rate_val = rate / 100 / 12;
    for (var i = 1; i <= months; i++) {
        table.interest[i] = principal * rate_val;
        table.principal[i] = monthly_payment - table.interest[i];
        table.balance[i] = Math.round(principal - table.principal[i])
        !== 0 ? principal - table.principal[i] : 0;
        principal = table.balance[i];
    }
    return table;
};
/**
 * Generate the amortization table with extra payment per month and a
 stores it in an array
 * @param {type} rate
 * @param {type} value
 * @param {type} monthly_payment
 * @returns {GOKAPITAL_CALCS.paymentsTableWithExtra.table}
 */
GOKAPITAL_CALCS.paymentsTableWithExtra = function (rate, value,
                                                   monthly_payment) {
    var table = {principal: [], interest: [], balance: [], payment: []};
    var principal = value;
    var rate_val = rate / 100 / 12;
    var i = 1;
    while (principal > 0) {
        table.interest[i] = principal * rate_val;
        table.principal[i] = monthly_payment - table.interest[i];
        table.balance[i] = Math.round(principal - table.principal[i])
        !== 0 ? principal - table.principal[i] : 0;
        table.payment[i] = principal + table.interest[i] >
        monthly_payment ? monthly_payment : principal + table.interest[i];
        principal = table.balance[i];
        i++;
    }
    return table;
};
/**
 * Draw an Area chart in the defined dom
 * @param {type} container
 * @param {type} title
 * @param {type} labels
 * @param {type} datasets
 * @returns {undefined}
 */
GOKAPITAL_CALCS.drawArea = function (container, title, labels, datasets) {
    new Chart(container, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: Object.assign(GOKAPITAL_CALCS.areaChartOptions, {
            title: {
                text: title,
                display: true
            }
        })
    });
};
/**
 * Draw a Pie chart in the defined dom
 * @param {type} container
 * @param {type} title
 * @param {type} labels
 * @param {type} datasets
 * @param {type} t1
 * @param {type} t2
 * @returns {undefined}
 */

GOKAPITAL_CALCS.drawPie = function (container, title, labels,
                                    datasets, t1 = null, t2 = null) {
    var ctx = document.getElementById(container).getContext("2d");
    var pie = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: datasets,
            labels: labels
        },
        options: Object.assign(GOKAPITAL_CALCS.doughnutChartOptions, {
            title: {
                text: title,
                display: true
            },
            t1: t1,
            t2: t2
        })
    });
    $("#" + container + '_legend').html(pie.generateLegend());
    $("#" + container + '_legend').on('click', "li", function () {
        pie.data.datasets[0].data[$(this).index()] += 50;
        pie.update();
    });
};
/**
 * Get the pdf data and set it in the export form
 * @returns {undefined}
 */
GOKAPITAL_CALCS.setPDFData = function () {
    var activeCalc = $('#gk_rs_calc');
    var title = $(activeCalc).find('h3 span').text();
    $('#export-data').append('<input name="title" type="hidden"
    value="' + title + '" />');
    $.each($(activeCalc).find('.calculator-inputs'), function (group) {
        $.each($(this).children(), function (k, e) {
            if ($(this).prop("tagName") === 'H4') {
                $('#export-data').append('<input name="loan_data[' +
                    group + '][subtitle]" type="hidden" value="' + $(e).text() + '" />');
            } else if ($(this).hasClass('radio-group-container')) {
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' +
                    $(e).find('.form-group:first-child').find('label').attr('for') +
                    '][label]" type="hidden" value="' +
                    $(e).find('.form-group:first-child').find('label').text() + '" />');
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' + $(e).find('.form-group:first-child
                input').attr('id') + '][value]" type="hidden" value="' +
                $(e).find('.form-group:first-child').find('input').val() + '" />');
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' + $(e).find('.form-group:first-child
                input').attr('id') + '][unit]" type="hidden" value="' +
                $(e).find('input:checked').val() + '" />');
            } else if ($(this).hasClass('form-group')) {
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' + $(e).find('label').attr('for') + '][label]"
                type="hidden" value="' + $(e).find('label').text() + '" />');
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' + $(e).find('input').attr('id') + '][value]"
                type="hidden" value="' + $(e).find('input').val() + '" />');
                $('#export-data').append('<input name="loan_data[' +
                    group + '][input][' + $(e).find('input').attr('id') + '][unit]"
                type="hidden" value="' + $(e).find('.input-group-addon').text() + '"
                    />');
            }
        });
    });
    var res = $(activeCalc).find('.res-tabs > ul > li:not(\'.ignore\') > a');
    if (res.length > 0) {
        $.each(res, function (k, e) {
            $($(e).attr('href')).css({display: 'block', visibility: 'visible'});
            setTimeout(function () {
                html2canvas($($(e).attr('href')), {
                    dpi: 900,
                    onrendered: function (canvas) {
                        var img = canvas.toDataURL("image/jpeg", 1);
                        $('#export-data').append('<input name="res[' +
                            k + '][title]" type="hidden" value="' + $(e).text() + '" />');
                        $('#export-data').append('<input name="res[' +
                            k + '][image]" type="hidden" value="' + img + '" />');
                        $($(e).attr('href')).removeAttr('style');
                    }
                });
            }, 100);
        });
    } else if ($(activeCalc).find('.res').length > 0) {
        html2canvas($(activeCalc).find('.res'), {
            dpi: 900,
            onrendered: function (canvas) {
                var img = canvas.toDataURL("image/jpeg", 1);
                $('#export-data').append('<input name="res[0][title]"
                type="hidden" value="' + title + '" />');
                $('#export-data').append('<input name="res[0][image]"
                type="hidden" value="' + img + '" />');
            }
        });
    }
};
$(document).ready(function () {
    /**
     * Register plugin to draw centered text
     */
    Chart.pluginService.register({
        afterDraw: function (chart) {
            if (chart.config.options.drawTotal) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
                ctx.restore();
                var fontSize = (height / 114).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#333333";
                if (chart.config.options.t1) {
                    var text = chart.config.options.t1,
                        textX = Math.round((width -
                            ctx.measureText(text).width) / 2),
                        textY = height / 2;
                    ctx.fillText(text, textX, textY);
                }
                var fontSize = fontSize * 0.6;
                ctx.font = fontSize + "em sans-serif";
                ctx.fillStyle = "#a2a2a2";
                if (chart.config.options.t2) {
                    var text = chart.config.options.t2,
                        textX = Math.round((width -
                            ctx.measureText(text).width) / 2),
                        textY = (height / 2) + 30;
                    ctx.fillText(text, textX, textY);
                }
                ctx.save();
            }
        }
    });
    /**
     * Format numbers
     */
    $('input[data-format="number"]').number(true, 2);
    $('input[data-format="currency"]').number(true, 0);
    $('#gk_rs_calc input').on('focus', function () {
        // $(this).val('');
        // $(this).select();
    });
    /**
     * Steps actions
     */

    $('#gk_rs_calc .with-steps .next').on('click', function (e) {
        e.preventDefault();
        GOKAPITAL_CALCS.nextStep($(this));
    });
    $('#gk_rs_calc .with-steps .prev').on('click', function (e) {
        e.preventDefault();
        GOKAPITAL_CALCS.prevStep($(this));
    });
    $('#gk_rs_calc .with-steps
    a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    GOKAPITAL_CALCS.changeStep($(e.target));
});

//**************************************************//
//********** Mortgage Payment Calculator **********//
//************************************************//

$(gk_real_calc1_calculate);

function gk_real_calc1_calculate() {

    if ($('#gk_real_calc1_interest').length === 0) return;


    var table =
        GOKAPITAL_CALCS.paymentsTable($('#gk_real_calc1_interest').val(),
            $('#gk_real_calc1_amount').val(), $('#gk_real_calc1_Length').val() *
            12);
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_real_calc1_interest').val(),
            $('#gk_real_calc1_amount').val(), $('#gk_real_calc1_Length').val() *
            12);
    var ltv = $('#gk_real_calc1_amount').val() /
        $('#gk_real_calc1_HomeValue').val() * 100;
    var taxes =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc1[PropertyTaxesSel]"]:checked').val(),
            $('#gk_real_calc1_PropertyTaxes').val(),
            $('#gk_real_calc1_HomeValue').val());
    var insurance =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc1[InsuranceSel]"]:checked').val(),
            $('#gk_real_calc1_Insurance').val(),
            $('#gk_real_calc1_HomeValue').val());
    if (ltv > 80) {
        var pmi =
            GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc1[PMISel]"]:checked').val(),
                $('#gk_real_calc1_PMI').val(), $('#gk_real_calc1_amount').val());
        var m_pmi = GOKAPITAL_CALCS.monthsWithPMI(table.balance,
            $('#gk_real_calc1_HomeValue').val(), 80);
    } else {
        var pmi = 0;
        var m_pmi = 0;
    }
    $('#gk_real_calc1_ratio').text($.number(ltv, 0, '.', ',') + '%');
    $('#gk_real_calc1_months_pmi').text(m_pmi);
    $('#gk_real_calc1_monthly_pmi').text('$' + $.number(pmi, 0, '.', ','));
    var datasets = [{
        data: [
            payment,
            taxes,
            insurance
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1],
            GOKAPITAL_CALCS.colors[2]
        ],
        label: 'Total Monthly Payments'
    }];
    GOKAPITAL_CALCS.drawPie('gk_real_calc1_c1', 'Total Monthly Payments', [
        'Monthly Principal & Interests',
        'Monthly Real Estate Taxes',
        'Monthly Insurance'
    ], datasets, 'Total', '$' + $.number(payment + taxes +
        insurance, 0, '.', ','));
}

$('#gk_real_calc1_calculate').on('click', gk_real_calc1_calculate);

//**************************************************//
//********** Mortgage Principal Calculator ********//
//************************************************//

$(gk_real_calc2_calculate);

function gk_real_calc2_calculate() {

    if ($('#gk_real_calc2_interest').length === 0) return;

    var table =
        GOKAPITAL_CALCS.paymentsTable($('#gk_real_calc2_interest').val(),
            $('#gk_real_calc2_amount').val(), $('#gk_real_calc2_Length').val() *
            12);
    var months = parseInt($('#gk_real_calc2_PaidPeriods').val()) + 1;
    var interest_period = table.interest.slice(1, months);
    var interest = interest_period.reduce((a, b) => a + b, 0);
    var principal_period = table.principal.slice(1, months);
    var principal = principal_period.reduce((a, b) => a + b, 0);
    var datasets = [{
        data: [
            principal,
            interest
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Amount Paid'
    }];
    var datasets2 = [{
        data: [
            principal,
            table.balance[months - 1]
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Total Monthly Payments'
    }];
    GOKAPITAL_CALCS.drawPie('gk_real_calc2_c1', 'Total Monthly Payments', [
        'Principal Applied',
        'Interest Paid'
    ], datasets, 'Total', '$' + $.number(principal + interest, 0,
        '.', ','));
    GOKAPITAL_CALCS.drawPie('gk_real_calc2_c2', 'Total Monthly Payments', [
        'Paid',
        'Balance'
    ], datasets2, 'Total', '$' + $.number(principal +
        table.balance[months - 1], 0, '.', ','));
}

$('#gk_real_calc2_calculate').on('click', gk_real_calc2_calculate);

//**************************************************//
//********** Interest-Only Calculator    **********//
//************************************************//

$(gk_real_calc3_calculate);

function gk_real_calc3_calculate() {

    if ($('#gk_real_calc3_amount').length === 0) return;

    var paymen_o_i = parseFloat($('#gk_real_calc3_amount').val())
        * parseFloat($('#gk_real_calc3_interest_rate').val()) / 100 / 12;
    var months = parseInt($('#gk_real_calc3_Length').val()) * 12;
    $('#gk_real_calc3_interest_only').text('$' +
        $.number(paymen_o_i, 0, '.', ','));
    $('#gk_real_calc3_interest_only_total').text('$' +
        $.number($('#gk_real_calc3_amount').val(), 0, '.', ','));
    var amount = parseFloat($('#gk_real_calc3_amount').val());
    var datasets = [{
        data: [
            amount,
            (paymen_o_i * months)
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Total Principal & Interest'
    }];
    GOKAPITAL_CALCS.drawPie('gk_real_calc3_c1', 'Total Monthly Payments', [
        'Principal',
        'Interest'
    ], datasets, 'Total', '$' + $.number((paymen_o_i * months) +
        amount, 0, '.', ','));
}

$('#gk_real_calc3_calculate').on('click', gk_real_calc3_calculate);

//**************************************************//
//********** Affordability Calculator    **********//
//************************************************//

$(gk_real_calc4_calculate);

function gk_real_calc4_calculate() {

    if ($('#gk_real_calc4_interest').length === 0) return;

    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_real_calc4_interest').val(),
            $('#gk_real_calc4_amount').val(), $('#gk_real_calc4_Length').val() *
            12);
    var taxes =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc4[PropertyTaxesSel]"]:checked').val(),
            $('#gk_real_calc4_PropertyTaxes').val(),
            $('#gk_real_calc4_HomeValue').val());
    var insurance =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc4[InsuranceSel]"]:checked').val(),
            $('#gk_real_calc4_AnnualInsurance').val(),
            $('#gk_real_calc4_HomeValue').val());
    var dwn_payment, home_value;
    var income = parseFloat($('#gk_real_calc4_Income').val()) +
        parseFloat($('#gk_real_calc4_Income2').val()) +
        parseFloat($('#gk_real_calc4_Income3').val()) +
        parseFloat($('#gk_real_calc4_Income4').val()) +
        parseFloat($('#gk_real_calc4_Income5').val());
    var payments = parseFloat($('#gk_real_calc4_AutoLoansPayment').val()) +
        parseFloat($('#gk_real_calc4_StudentLoansPayment').val()) +
        parseFloat($('#gk_real_calc4_InstallmentLoansPayment').val()) +
        parseFloat($('#gk_real_calc4_RevolvingAccountsPayment').val()) +
        parseFloat($('#gk_real_calc4_OtherDebtPayment').val());
    if ($('[name="gk_real_calc4[DownPaymentSel]"]:checked').val() === 0) {
        dwn_payment = parseFloat($('#gk_real_calc4_DownPayment').val());
        home_value = parseFloat($('#gk_real_calc4_amount').val())
            + dwn_payment;
    } else {
        var rate = parseFloat($('#gk_real_calc4_DownPayment').val() / 100);
        home_value = parseFloat($('#gk_real_calc4_amount').val())
            / (1 - rate);
        dwn_payment = home_value * rate;
    }
    var ltv = $('#gk_real_calc4_amount').val() / home_value * 100;
    if (ltv > 80) {
        var pmi =
            GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc4[PMISel]"]:checked').val(),
                $('#gk_real_calc4_AnnualPMI').val(),
                $('#gk_real_calc4_amount').val());
    } else {
        var pmi = 0;
    }
    var total = payment + taxes + insurance + pmi;
    $('#gk_real_calc4_total').text('$' + $.number(total, 0, '.', ','));
    $('#gk_real_calc4_m_income').text('$' + $.number(income, 0, '.', ','));
    $('#gk_real_calc4_d_payments').text('$' + $.number(payments,
        0, '.', ','));
    $('#gk_real_calc4_f_radio').text($.number(total / income *
        100, 0, '.', ',') + '%');
    $('#gk_real_calc4_b_radio').text($.number((total + payments) /
        income * 100, 0, '.', ',') + '%');
    $('#gk_real_calc4_l_amount').text('$' +
        $.number($('#gk_real_calc4_amount').val(), 0, '.', ','));
    $('#gk_real_calc4_d_payment').text('$' + $.number(dwn_payment,
        0, '.', ','));
    $('#gk_real_calc4_h_value').text('$' + $.number(home_value, 0,
        '.', ','));
    var datasets = [{
        data: [
            payment,
            taxes,
            insurance,
            pmi
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1],
            GOKAPITAL_CALCS.colors[2]
        ],
        label: 'Total Monthly Payments'
    }];
    GOKAPITAL_CALCS.drawPie('gk_real_calc4_c1', 'Total Monthly Payments', [
        'Monthly Principal & Interests',
        'Monthly Real Estate Taxes',
        'Monthly Insurance',
        'Monthly PMI'
    ], datasets, 'Total', '$' + $.number(total, 0, '.', ','));
}

$('#gk_real_calc4_calculate').on('click', gk_real_calc4_calculate);

//***************************************************//
//* How Much Income do I Need in Order to Qualify? *//
//*************************************************//

$(gk_real_calc5_calculate);

function gk_real_calc5_calculate() {

    if ($('#gk_real_calc5_HomeValue').length === 0) return;

    var dwn_payment;
    if ($('[name="gk_real_calc5[DownPaymentSel]"]:checked').val() === 0) {
        dwn_payment = parseFloat($('#gk_real_calc5_DownPayment').val());
    } else {
        var rate = parseFloat($('#gk_real_calc5_DownPayment').val() / 100);
        dwn_payment = $('#gk_real_calc5_HomeValue').val() * rate;
    }
    var ammount = parseFloat($('#gk_real_calc5_HomeValue').val())
        - dwn_payment;
    var table =
        GOKAPITAL_CALCS.paymentsTable($('#gk_real_calc5_interest').val(),
            ammount, $('#gk_real_calc5_Length').val() * 12);
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_real_calc5_interest').val(),
            ammount, $('#gk_real_calc5_Length').val() * 12);
    var ltv = ammount / $('#gk_real_calc5_HomeValue').val() * 100;
    var taxes =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc5[PropertyTaxesSel]"]:checked').val(),
            $('#gk_real_calc5_PropertyTaxes').val(),
            $('#gk_real_calc5_HomeValue').val());
    var insurance =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc5[InsuranceSel]"]:checked').val(),
            $('#gk_real_calc5_AnnualInsurance').val(),
            $('#gk_real_calc5_HomeValue').val());
    if (ltv > 80) {
        var pmi =
            GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc5[PMISel]"]:checked').val(),
                $('#gk_real_calc5_AnnualPMI').val(), ammount);
        var m_pmi = GOKAPITAL_CALCS.monthsWithPMI(table.balance,
            $('#gk_real_calc5_HomeValue').val(), 80);
    } else {
        var pmi = 0;
        var m_pmi = 0;
    }
    var total = payment + taxes + insurance + pmi;
    var req_income = total /
        ($('#gk_real_calc5_EstimatedFrontRatio').val() / 100);
    var allowed_payments = req_income - (total /
        ($('#gk_real_calc5_BackRatio').val() / 100));
    $('#gk_real_calc5_ratio').text($.number(ltv, 0, '.', ',') + '%');
    $('#gk_real_calc5_months_pmi').text(m_pmi);
    $('#gk_real_calc5_monthly_pmi').text('$' + $.number(pmi, 0, '.', ','));
    $('#gk_real_calc5_total').text('$' + $.number(total, 0, '.', ','));
    $('#gk_real_calc5_dep_payments').text('$' +
        $.number(allowed_payments, 0, '.', ','));
    $('#gk_real_calc5_req_income').text('$' + $.number(req_income,
        0, '.', ','));
    var datasets = [{
        data: [
            payment,
            taxes,
            insurance
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1],
            GOKAPITAL_CALCS.colors[2]
        ],
        label: 'Total Monthly Payments'
    }];
    GOKAPITAL_CALCS.drawPie('gk_real_calc5_c1', 'Total Monthly Payments', [
        'Monthly Principal & Interests',
        'Monthly Real Estate Taxes',
        'Monthly Insurance'
    ], datasets, 'Total', '$' + $.number(payment + taxes +
        insurance, 0, '.', ','));
}

$('#gk_real_calc5_calculate').on('click', gk_real_calc5_calculate);

//**************************************************//
//**********       Rent vs. Buy          **********//
//************************************************//

$(gk_real_calc6_calculate);

function gk_real_calc6_calculate() {

    if ($('#gk_real_calc6_calculate').length === 0) return;

    var ammount = parseFloat($('#gk_real_calc6_amount').val());
    var table =
        GOKAPITAL_CALCS.paymentsTable($('#gk_real_calc6_interest').val(),
            ammount, $('#gk_real_calc6_Length').val() * 12);
    var ybs = parseInt($('#gk_real_calc6_YearsBeforeSell').val());
    var months = ybs * 12;
    var rent_val = $('#gk_real_calc6_PeriodRent').val();
    var total_rent = rent_val * 12;
    var payment_history = [parseFloat(rent_val)];
    for (var i = 2; i <= ybs; i++) {
        rent_val = rent_val * (1 +
            ($('#gk_real_calc6_AnnualRentIncrease').val() / 100));
        total_rent += rent_val * 12;
        payment_history.push(rent_val);
    }
    var taxes =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc6[PropertyTaxesSel]"]:checked').val(),
            $('#gk_real_calc6_PropertyTaxes').val(),
            $('#gk_real_calc6_HomeValue').val());
    var insurance =
        GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc6[InsuranceSel]"]:checked').val(),
            $('#gk_real_calc6_AnnualInsurance').val(),
            $('#gk_real_calc6_HomeValue').val());
    var buy_taxes_ins = (taxes + insurance) * months;
    var ltv = ammount / $('#gk_real_calc6_HomeValue').val() * 100;
    if (ltv > 80) {
        var pmi =
            GOKAPITAL_CALCS.yearlyToMonthly($('[name="gk_real_calc6[PMISel]"]:checked').val(),
                $('#gk_real_calc6_AnnualPMI').val(), ammount);
    } else {
        var pmi = 0;
    }
    var m_pmi = GOKAPITAL_CALCS.monthsWithPMI(table.balance,
        $('#gk_real_calc6_HomeValue').val(), 80);
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_real_calc6_interest').val(),
            ammount, $('#gk_real_calc6_Length').val() * 12);
    var monthly_payment = payment + taxes + insurance +
        ($('#gk_real_calc6_AnnualMaintanance').val() / 12);
    var monthly_payment_with_pmi = monthly_payment + pmi;
    if (m_pmi < months) {
        var total_pmi = pmi * m_pmi;
        var buy_monthly_payment = (monthly_payment_with_pmi *
            m_pmi + monthly_payment * (months - m_pmi)) / months;
    } else {
        var total_pmi = pmi * months;
        var buy_monthly_payment = monthly_payment_with_pmi;
    }
    var total_payments = payment * months;
    var total_maint = $('#gk_real_calc6_AnnualMaintanance').val() * ybs;
    var total_buy = total_payments + total_pmi + buy_taxes_ins +
        total_maint;
    var rent_monthly_payment = payment_history.reduce((a, b) => a
        + b, 0) / payment_history.length;
    var appreciation =
        parseFloat($('#gk_real_calc6_HomeValue').val()) * Math.pow(1 +
        ($('#gk_real_calc6_AnnualAppreciation').val() / 100), ybs);
    var disc = ammount * $('#gk_real_calc6_Taxes').val() *
        $('#gk_real_calc6_Points').val() / 100 / 100;
    var tax_saves = ($('#gk_real_calc6_Taxes').val() / 100 * taxes
        * months) + disc;
    var proc_minus_cost = appreciation - (appreciation *
        $('#gk_real_calc6_SellingCost').val() / 100);
    var total_rent_savings = total_buy - total_rent - tax_saves;

    $('#gk_real_calc6_buy_taxes_insurance').text('$' +
        $.number(buy_taxes_ins, 0, '.', ','));
    $('#gk_real_calc6_rent_taxes_insurance').text('$' + '0');
    $('#gk_real_calc6_buy_pmi').text('$' + $.number(total_pmi, 0,
        '.', ','));
    $('#gk_real_calc6_rent_pmi').text('$' + '0');
    $('#gk_real_calc6_buy__maintenance').text('$' +
        $.number(total_maint, 0, '.', ','));
    $('#gk_real_calc6_rent_maintenance').text('$' + '0');
    $('#gk_real_calc6_buy_total').text('$' + $.number(total_buy,
        0, '.', ','));
    $('#gk_real_calc6_rent_total').text('$' + $.number(total_rent,
        0, '.', ','));
    $('#gk_real_calc6_buy_monthly_payment').text('$' +
        $.number(buy_monthly_payment, 0, '.', ','));
    $('#gk_real_calc6_rent_monthly_payment').text('$' +
        $.number(rent_monthly_payment, 0, '.', ','));
    $('#gk_real_calc6_rent_monthly_savings').text('$' +
        $.number(buy_monthly_payment - rent_monthly_payment, 0, '.', ','));
    $('#gk_real_calc6_buy_tax_saving').text('$' +
        $.number(tax_saves, 0, '.', ','));
    $('#gk_real_calc6_rent_tax_saving').text('$' + '0');
    $('#gk_real_calc6_buy_rent_saving').text('$' +
        $.number(total_rent_savings, 0, '.', ','));
    $('#gk_real_calc6_house_app_val').text('$' +
        $.number(appreciation, 0, '.', ','));
    $('#gk_real_calc6_proceeds_minus_cost').text('$' +
        $.number(proc_minus_cost, 0, '.', ','));
    $('#gk_real_calc6_loan_balance').text('$' +
        $.number(table.balance[months], 0, '.', ','));
    $('#gk_real_calc6_equity_apprecation').text('$' +
        $.number(proc_minus_cost - table.balance[months], 0, '.', ','));
    $('#gk_real_calc6_purchase_benefits').text('$' +
        $.number(proc_minus_cost - table.balance[months] - total_rent_savings,
            0, '.', ','));
}

$('#gk_real_calc6_calculate').on('click', gk_real_calc6_calculate);

//**************************************************//
//**********       SBA Loan Payment      **********//
//************************************************//

$(gk_bl_calc1_calculate);

function gk_bl_calc1_calculate() {

    if ($('#gk_bl_calc1_calculate').length === 0) return;

    var length;
    if ($('[name="gk_bl_calc1[LengthSel]"]:checked').val() === 'Yrs') {
        var length = $('#gk_bl_calc1_Length').val() * 12;
    } else {
        var length = $('#gk_bl_calc1_Length').val();
    }
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_bl_calc1_interest').val(),
            $('#gk_bl_calc1_amount').val(), length) +
        parseFloat($('#gk_bl_calc1_extra_payment').val());
    var table =
        GOKAPITAL_CALCS.paymentsTableWithExtra($('#gk_bl_calc1_interest').val(),
            $('#gk_bl_calc1_amount').val(), payment);
    var payments = table.balance.length - 1;
    var tableHtml = $('<table>');
    tableHtml.append($('<thead>'));
    tableHtml.append($('<tbody>'));
    tableHtml.children('thead').append('<tr><th>Period</th><th>Payment</th><th>Interest</th><th>Principal</th><th>Balance</th></tr>');
    for (var i = 1; i <= table.balance.length - 1; i++) {
        tableHtml.children('tbody').append('<tr>\n\
                        <td>' + i + '</td>\n\
                        <td>$' + $.number(table.payment[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.interest[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.principal[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.balance[i], 0, '.',
            ',') + '</td>\n\
                        </tr>');
    }
    tableHtml.addClass('table');
    $('#amortization_input').val(tableHtml.outerHTML());
    $('#gk_bl_calc1_monthly_payment').text('$' + $.number(payment,
        0, '.', ','));
    $('#gk_bl_calc1_payments').text(table.balance.length - 1);
    $('#gk_bl_calc1_total').text('$' + $.number(payments *
        payment, 0, '.', ','));
    $('#gk_bl_calc1_amort_table').html(tableHtml);
    tableHtml.dataTable({
        lengthChange: false,
        info: false,
        searching: false,
        pageLength: 12,
        pagingType: "numbers"
    });
    table.principal[0] = 0;
    table.interest[0] = 0;
    table.principal.shift();
    table.interest.shift();
    var datasets = [
        {
            label: "Principal",
            backgroundColor: GOKAPITAL_CALCS.colors[0],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[0],
            borderWidth: 1,
            radius: 1,
            data: table.principal,
            fill: 'start'
        },
        {
            label: "Interest",
            backgroundColor: GOKAPITAL_CALCS.colors[1],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[1],
            borderWidth: 1,
            radius: 1,
            data: table.interest,
            fill: 'start'
        }
    ];
    var datasets2 = [{
        data: [
            parseFloat($('#gk_bl_calc1_amount').val()),
            payments * payment - parseFloat($('#gk_bl_calc1_amount').val())
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Total Payback Amount'
    }];
    GOKAPITAL_CALCS.drawArea('gk_bl_calc1_c1', 'Monthly Payments',
        Object.keys(table.principal), datasets);
    GOKAPITAL_CALCS.drawPie('gk_bl_calc1_c2', 'Total Payback
    Amount', ['Principal', 'Interest'], datasets2, 'Total', '$' +
    $.number(payments * payment, 0, '.', ','));

}

$('#gk_bl_calc1_calculate').on('click', gk_bl_calc1_calculate);


//**************************************************//
//**********     Invoice Factoring       **********//
//************************************************//

$(gk_bl_calc2_calculate);

function gk_bl_calc2_calculate() {

    if ($('#gk_bl_calc2_calculate').length === 0) return;

    var total = parseFloat($('#gk_bl_calc2_amount').val());
    var amount = $('#gk_bl_calc2_amount').val() *
        $('#gk_bl_calc2_perc_advance').val() / 100;
    var cost = $('#gk_bl_calc2_amount').val() *
        $('#gk_bl_calc2_fact_fee').val() * ($('#gk_bl_calc2_Length').val() /
            7) / 100;
    $('#gk_bl_calc2_adv_amount').text('$' + $.number(amount, 0, '.', ','));
    $('#gk_bl_calc2_res_amount').text('$' + $.number(total -
        amount - cost, 0, '.', ','));
    $('#gk_bl_calc2_eff_apr').text($.number(52 *
        $('#gk_bl_calc2_fact_fee').val(), 2, '.', ',') + '%');
    $('#gk_bl_calc2_cost').text('$' + $.number(cost, 0, '.', ','));
    var datasets = [{
        data: [
            amount,
            total - amount - cost,
            cost
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1],
            GOKAPITAL_CALCS.colors[2]
        ],
        label: 'Invoice Detail'
    }];
    GOKAPITAL_CALCS.drawPie('gk_bl_calc2_c2', 'Total Payback
    Amount', ['Advance Amount', 'Reserve Amount', 'Cost of Financing'],
    datasets, 'Total', '$' + $.number(total, 0, '.', ','));
}

$('#gk_bl_calc2_calculate').on('click', gk_bl_calc2_calculate);

//**************************************************//
//**********    Merchant Cash Advances   **********//
//************************************************//

$(gk_bl_calc3_calculate);

function gk_bl_calc3_calculate() {

    if ($('#gk_bl_calc3_calculate').length === 0) return;

    var payment = $('#gk_bl_calc3_cc_sales').val() *
        $('#gk_bl_calc3_sales_purch').val() / 100 / 30;
    var days = $('#gk_bl_calc3_amount').val() *
        $('#gk_bl_calc3_fact_rate').val() / payment;
    var cost = (($('#gk_bl_calc3_amount').val() *
        $('#gk_bl_calc3_fact_rate').val()) -
        parseFloat($('#gk_bl_calc3_amount').val())) +
        ($('#gk_bl_calc3_amount').val() *
            $('#gk_bl_calc3_org_fee').val() / 100);
    $('#gk_bl_calc3_day_pay').text('$' + $.number(payment, 0, '.', ','));
    $('#gk_bl_calc3_res_repay').text($.number(days, 0, '.', ',') + ' Days');
    $('#gk_bl_calc3_cost').text('$' + $.number(cost, 0, '.', ','));
}

$('#gk_bl_calc3_calculate').on('click', gk_bl_calc3_calculate);

//**************************************************//
//********** Equipment Lease Calculator  **********//
//************************************************//

$(gk_bl_calc4_calculate);

function gk_bl_calc4_calculate() {

    if ($('#gk_bl_calc4_calculate').length === 0) return;

    var length;
    if ($('[name="gk_bl_calc4[LengthSel]"]:checked').val() === 'Yrs') {
        var length = $('#gk_bl_calc4_Length').val() * 12;
    } else {
        var length = $('#gk_bl_calc4_Length').val();
    }
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_bl_calc4_interest').val(),
            $('#gk_bl_calc4_amount').val(), length);
    var table =
        GOKAPITAL_CALCS.paymentsTableWithExtra($('#gk_bl_calc4_interest').val(),
            $('#gk_bl_calc4_amount').val(), payment);
    var payments = table.balance.length - 1;
    var tableHtml = $('<table>');
    tableHtml.append($('<thead>'));
    tableHtml.append($('<tbody>'));
    tableHtml.children('thead').append('<tr><th>Period</th><th>Payment</th><th>Interest</th><th>Principal</th><th>Balance</th></tr>');
    for (var i = 1; i <= table.balance.length - 1; i++) {
        tableHtml.children('tbody').append('<tr>\n\
                        <td>' + i + '</td>\n\
                        <td>$' + $.number(table.payment[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.interest[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.principal[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.balance[i], 0, '.',
            ',') + '</td>\n\
                        </tr>');
    }
    tableHtml.addClass('table');
    $('#amortization_input').val(tableHtml.outerHTML());
    $('#gk_bl_calc4_monthly_payment').text('$' + $.number(payment,
        0, '.', ','));
    $('#gk_bl_calc4_payments').text(table.balance.length - 1);
    $('#gk_bl_calc4_total').text('$' + $.number(payments *
        payment, 0, '.', ','));
    $('#gk_bl_calc4_amort_table').html(tableHtml);
    tableHtml.dataTable({
        lengthChange: false,
        info: false,
        searching: false,
        pageLength: 12,
        pagingType: "numbers"
    });
    table.principal[0] = 0;
    table.interest[0] = 0;
    table.principal.shift();
    table.interest.shift();
    var datasets = [
        {
            label: "Principal",
            backgroundColor: GOKAPITAL_CALCS.colors[0],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[0],
            borderWidth: 1,
            radius: 1,
            data: table.principal,
            fill: 'start'
        },
        {
            label: "Interest",
            backgroundColor: GOKAPITAL_CALCS.colors[1],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[1],
            borderWidth: 1,
            radius: 1,
            data: table.interest,
            fill: 'start'
        }
    ];
    var datasets2 = [{
        data: [
            parseFloat($('#gk_bl_calc4_amount').val()),
            payments * payment - parseFloat($('#gk_bl_calc4_amount').val())
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Total Payback Amount'
    }];
    GOKAPITAL_CALCS.drawArea('gk_bl_calc4_c1', 'Monthly Payments',
        Object.keys(table.principal), datasets);
    GOKAPITAL_CALCS.drawPie('gk_bl_calc4_c2', 'Total Payback
    Amount', ['Principal', 'Interest'], datasets2, 'Total', '$' +
    $.number(payments * payment, 0, '.', ','));
}

$('#gk_bl_calc4_calculate').on('click', gk_bl_calc4_calculate);

//**************************************************//
//**********    Revenue-based            **********//
//************************************************//

$(gk_bl_calc5_calculate);

function gk_bl_calc5_calculate() {

    if ($('#gk_bl_calc5_calculate').length === 0) return;

    var cost = $('#gk_bl_calc5_amount').val() *
        $('#gk_bl_calc5_interest').val();
    var interest = cost - parseInt($('#gk_bl_calc5_amount').val());
    var daily = cost / ($('#gk_bl_calc5_Length').val() * 22);
    var weekly = daily * 5;
    $('#gk_bl_calc5_payments_daily').text('$' + $.number(daily, 0,
        '.', ','));
    $('#gk_bl_calc5_payments_weekly').text('$' + $.number(weekly,
        0, '.', ','));
    $('#gk_bl_calc5_payments_interest').text('$' +
        $.number(interest, 0, '.', ','));
    $('#gk_bl_calc5_payments_total').text('$' + $.number(cost, 0,
        '.', ','));

    $('#gk_bl_calc3_cost').text('$' + $.number(cost, 0, '.', ','));
}

$('#gk_bl_calc5_calculate').on('click', gk_bl_calc5_calculate);

//**************************************************//
//******** Five Years Term Loan Calculator ********//
//************************************************//

$(gk_bl_calc6_calculate);

function gk_bl_calc6_calculate() {

    if ($('#gk_bl_calc6_calculate').length === 0) return;

    var length = $('#gk_bl_calc6_Length').val() * 12;
    var payment =
        GOKAPITAL_CALCS.monthlyPayment($('#gk_bl_calc6_interest').val(),
            $('#gk_bl_calc6_amount').val(), length);
    var table =
        GOKAPITAL_CALCS.paymentsTableWithExtra($('#gk_bl_calc6_interest').val(),
            $('#gk_bl_calc6_amount').val(), payment);
    var payments = table.balance.length - 1;
    var tableHtml = $('<table>');
    tableHtml.append($('<thead>'));
    tableHtml.append($('<tbody>'));
    tableHtml.children('thead').append('<tr><th>Period</th><th>Payment</th><th>Interest</th><th>Principal</th><th>Balance</th></tr>');
    for (var i = 1; i <= table.balance.length - 1; i++) {
        tableHtml.children('tbody').append('<tr>\n\
                        <td>' + i + '</td>\n\
                        <td>$' + $.number(table.payment[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.interest[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.principal[i], 0, '.',
            ',') + '</td>\n\
                        <td>$' + $.number(table.balance[i], 0, '.',
            ',') + '</td>\n\
                        </tr>');
    }
    tableHtml.addClass('table');
    $('#amortization_input').val(tableHtml.outerHTML());
    $('#gk_bl_calc6_monthly_payment').text('$' + $.number(payment,
        0, '.', ','));
    $('#gk_bl_calc6_payments').text(table.balance.length - 1);
    $('#gk_bl_calc6_total').text('$' + $.number(payments *
        payment, 0, '.', ','));
    $('#gk_bl_calc6_amort_table').html(tableHtml);
    tableHtml.dataTable({
        lengthChange: false,
        info: false,
        searching: false,
        pageLength: 12,
        pagingType: "numbers"
    });
    table.principal[0] = 0;
    table.interest[0] = 0;
    table.principal.shift();
    table.interest.shift();
    var datasets = [
        {
            label: "Principal",
            backgroundColor: GOKAPITAL_CALCS.colors[0],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[0],
            borderWidth: 1,
            radius: 1,
            data: table.principal,
            fill: 'start'
        },
        {
            label: "Interest",
            backgroundColor: GOKAPITAL_CALCS.colors[1],
            borderColor: GOKAPITAL_CALCS.colorsAlpha[1],
            borderWidth: 1,
            radius: 1,
            data: table.interest,
            fill: 'start'
        }
    ];
    var datasets2 = [{
        data: [
            parseFloat($('#gk_bl_calc6_amount').val()),
            payments * payment - parseFloat($('#gk_bl_calc6_amount').val())
        ],
        backgroundColor: [
            GOKAPITAL_CALCS.colors[0],
            GOKAPITAL_CALCS.colors[1]
        ],
        label: 'Total Payback Amount'
    }];
    GOKAPITAL_CALCS.drawArea('gk_bl_calc6_c1', 'Monthly Payments',
        Object.keys(table.principal), datasets);
    GOKAPITAL_CALCS.drawPie('gk_bl_calc6_c2', 'Total Payback
    Amount', ['Principal', 'Interest'], datasets2, 'Total', '$' +
    $.number(payments * payment, 0, '.', ','));
}

$('#gk_bl_calc6_calculate').on('click', gk_bl_calc6_calculate);

/**
 * Get this widget
 */
$('.get-code').click(function () {

    var code = '<iframe style="width: 100%; height: 900px;"
    frameborder="0" scrolling="no" name="content" id="content"  src="' +
    $(this).data('url') + '"  allowfullscreen ></iframe><script
    src="https://platform.gokapital.com/calculators/calculators.js"></script>';
    $('#code').text(code);
});
$('#code').click(function () {
    $(this).select();
});
/**
 * Activate save PDF button
 */
$('.calculate').on('click', function () {
    GOKAPITAL_CALCS.setPDFData();
    $('#export').fadeIn();
});
/**
 * Hide export form when tab change
 */
$('#gk_rs_calc .main a[data-toggle="tab"]').on('show.bs.tab', function () {
    $('#export').fadeOut();
});
/**
 * Validations
 */
$('#gk_bl_calc2_perc_advance').on('change', function () {
    if ($(this).val() > 100) {
        alert('Percent Advanced must be smaller than 100%');
        $(this).val(100);
    }
});
$('#gk_bl_calc5_interest').on('change', function () {
    if ($(this).val() < 1.1 || $(this).val() >= 1.5) {
        alert('Factor Rate must be between 1.1 and 1.5');
        $(this).val(1.2);
    }
});
$('#gk_bl_calc6_interest').on('change', function () {
    if ($(this).val() < 6 || $(this).val() > 22) {
        alert('Interest Rate Rate must be between 6% and 22%');
        $(this).val(6);
    }
});
$('#gk_bl_calc6_amount').on('change', function () {
    if ($(this).val() < 25000 || $(this).val() > 500000) {
        alert('Loan Amount must be between $25,000 and $500,000');
        $(this).val(25000);
    }
});
$('#gk_bl_calc6_Length').on('change', function () {
    if ($(this).val() < 1 || $(this).val() > 5) {
        alert('Length must be between 1 and 5');
        $(this).val(5);
    }
});
});


$(function () {

    let a = document.createElement('a');
    a.href = document.referrer;
    let dominio = a.protocol + '//' + a.host + '/';

    console.log(dominio);

    if (document.referrer ===
        'https://beta.gokapital.com/crm/calculators/business_loans' ||
        document.referrer ===
        'https://beta.gokapital.com/crm/calculators/real_estate'
        || document.referrer ===
        'https://beta2.gokapital.com/crm/calculators/business_loans' ||
        document.referrer ===
        'https://beta2.gokapital.com/crm/calculators/real_estate'
        || document.referrer ===
        'https://platform.gokapital.com/crm/calculators/business_loans' ||
        document.referrer ===
        'https://platform.gokapital.com/crm/calculators/real_estate'
        || dominio === 'https://www.gokapital.com/' || dominio ===
        'http://new.prestamosusa.com/' || dominio ===
        'https://www.prestamosusa.com/' || dominio ===
        'http://new1.prestamosusa.com/'
        || dominio === 'https://new1.prestamosusa.com/')
        $('#gk_rs_calc').find('.footer').hide();

    if (dominio === 'https://www.gokapital.com/' || dominio ===
        'http://new.prestamosusa.com/' || dominio ===
        'http://new1.prestamosusa.com/'
        || dominio === 'https://new1.prestamosusa.com/' || dominio ===
        'https://www.prestamosusa.com/')
        $('#gk_rs_calc').find('.get-code').hide();

//obtener url de incrustracion del iframe
    $('#source').val(document.referrer)


});

window.onload = function () {
    let clipboard = new Clipboard('.btn-copy');

    clipboard.on('success', function (e) {
        $('[data-toggle="tooltip"]').tooltip('show');

        setTimeout(function () {
            $('[data-toggle="tooltip"]').tooltip('destroy');
        }, 1500)

    });


    //parent.iframeLoaded();
    var iFrameID = window.parent.document.getElementById('content');
    console.log(iFrameID);
    if (iFrameID) {
        // here you can make the height, I delete it first, then I make it again
        iFrameID.height = "";
        iFrameID.height =
            (iFrameID.contentWindow.document.body.scrollHeight + 100) + "px";
        $(iFrameID).css('height',
            (iFrameID.contentWindow.document.body.scrollHeight + 100) + "px");
    }
};
