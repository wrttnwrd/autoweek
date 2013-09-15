/*
 * @file
 * Custom functionality for Autoweek Racing Result Event Manager.
 */

//wrapper to help with jQuery Compatibility
var lastRank = 1;
var driverRanks = [];

jQuery(function($) {


    //Listener for Series - Class selector.  Will reset current page and selected event.
    $('#seriesSelector').change(function() {
        document.location.href = '?q=raceadmin'
                + '&c='
                + $(this).val()
                + '&s='
                + Drupal.settings.awr_result_manager.season
                + '&page=0'
                + '&pgs='
                + Drupal.settings.awr_result_manager.page_size
                ;
    });

    //Listener for Season selector.  Will reset current page and selected event.
    $('#seasonSelector').change(function() {
        document.location.href = '?q=raceadmin'
                + '&c='
                + Drupal.settings.awr_result_manager.class_id
                + '&s='
                + $(this).val()
                + '&page=0'
                + '&pgs='
                + Drupal.settings.awr_result_manager.page_size
                ;
    });

    //Listener for Page Size selector.  Will reset current page and selected event.
    $('#pageSizeSelector').change(function() {
        document.location.href = '?q=raceadmin'
                + '&c='
                + Drupal.settings.awr_result_manager.class_id
                + '&s='
                + Drupal.settings.awr_result_manager.season
                + '&page=0'
                + '&pgs='
                + $(this).val()
                ;
    });

    //Listener for Series - Class selector.  Will reset current page and selected event.
    $('.selectEvent').click(function() {
        document.location.href = '?q=raceadmin'
                + '&nid='
                + $(this).attr('nid')
                + '&vid='
                + $(this).attr('vid')
                ;
    });

    //Listener for Set Rank Buttons
    $('.setRank').click(function() {

        //reset overall rank if there is one higher.

        //get all entered ranks
        var ranks = [];
        $('.rankBox').each(function() {
            if ($(this).val() > 0) {
                ranks.push($(this).val());
            }
        });

        var missingRank = absentRank(ranks);
        if (missingRank !== 0) {
            lastRank = missingRank;
        } else {
            while (ranks.indexOf(lastRank) !== -1) {
                lastRank++;
            }
        }

        var drvrid = $(this).attr('nid');
        enableRowNascar(drvrid);
        $('#pb' + drvrid).focus().select();
        updateDriverArray();
    });

    $('.rankBox').change(function() {
        var drvrid = $(this).attr('nid');
        lastRank = $(this).val();
        enableRowNascar(drvrid);
        updateDriverArray();
    });

    $('.clear').click(function() {
        var drvrid = $(this).attr('nid');
        lastRank = 1;
        $('#rb' + drvrid).val('');
        $('#pb' + drvrid).addClass('disabled');
        $('#pb' + drvrid).val('');
        $('#cl' + drvrid).addClass('disabled');
        $('#cl' + drvrid).val('');
        $('#strt' + drvrid).addClass('disabled');
        $('#strt' + drvrid).val('');
        $('#stus' + drvrid).addClass('disabled');
        $('#stus' + drvrid).val('');
        $('#clear' + drvrid).addClass('disabled');
        $('#pb' + drvrid).val('');
        updateDriverArray();

    });

    function enableRowNascar(drvrid) {
        $('#rb' + drvrid).val(lastRank);
        $('#pb' + drvrid).removeClass('disabled');
        $('#cl' + drvrid).removeClass('disabled');
        $('#strt' + drvrid).removeClass('disabled');
        $('#stus' + drvrid).removeClass('disabled');
        $('#clear' + drvrid).removeClass('disabled');
        $('#pb' + drvrid).val(44 - lastRank);
    }

    function absentRank(arr) {

        var mia = 0;

        //find highest rank
        var max_rank = (Math.max.apply(Math, arr) + 1);

        //lowest rank
        var min_rank = 1;

        while (min_rank <= max_rank) {
            if (arr.indexOf(String(min_rank)) === -1) {
                mia = min_rank;
                break;
            }
            min_rank++;

        }
        return mia;
    }

    function updateDriverArray() {
        driverRanks = [];
        $('.rankBox').each(function() {
            if ($(this).val() > 0) {
                driverRanks.push(Array($(this).val(), $(this).attr('nid')));
            }
        });
        driverRanks.sort((function() {
            return function(a, b) {
                return a[0] - b[0];
            };
        })(1));

        var rankHtml = "<table>";
        $.each(driverRanks, function(index, value) {
            var firstName = $('#fn' + value[1]).html();
            var lastName = $('#ln' + value[1]).html();
            rankHtml += "<tr><td>" + value[0] + "</td><td>" + firstName + " " + lastName + "</td></tr>";
        });

        $('.floaterBody').html(rankHtml);
    }


    $(".form-autocomplete").autocomplete({
        source: Drupal.settings.awr_result_manager.status_list,
        open: function(event, ui) {
            $('.ui-menu').width(200).css('z-index', 1000);
        }
    });


    updateDriverArray();
    $('.driversTable').stickyTableHeaders();
});