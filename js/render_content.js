$(document).ready(function () {
    $.get('admin/fetch_data.php?data=statistic', function (data) {
        $('#slot1').html(data[0].statistic_desc);
        $('#slot2').html(data[1].statistic_desc);
        $('#slot3').html(data[2].statistic_desc);
        $('#slot4').html(data[3].statistic_desc);
    });
    $.get('admin/fetch_data.php?data=story', function (data) {
        var i;
        for (i = 0; i < data.length; i++) {
            if (i % 2 == 0) {
                $('.story').append('<div class="left row"><div class="col-12 col-lg-6 story-left"><img src="images/' + data[i].story_image + '" alt="' + data[i].story_name + '"></div><div class="col-12 col-lg-6 story-left-desc"><h2 class="storyName">' + data[i].story_name + '</h2><p class="StoryTitle">' + data[i].story_title + '</p><div class="story-desc-wrap"><p class="story_paragraph">' + data[i].story_paragraph + '</p></div></div></div>');
            } else if (i % 2 == 1) {
                $('.story').append('<div class="right row"><div class="col-12 col-lg-6 order-lg-12 story-right"><img src="images/' + data[i].story_image + '" alt="' + data[i].story_name + '"></div><div class="col-12 col-lg-6 order-lg-1 story-right-desc"><h2 class="storyName">' + data[i].story_name + '</h2><p class="StoryTitle">' + data[i].story_title + '</p><div class="story-desc-wrap"><p class="story_paragraph">' + data[i].story_paragraph + '</p></div></div></div>');
            }
        }
    });
});