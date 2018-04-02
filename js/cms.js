$(document).ready(function(){
    $(".selectStory").click(function(e){
        $.get("cms_fetch_data.php?content=story&getData=" + $(this).attr("id"), function(data){
            $("#storyId").val(data.story_id);
            $("#storyTitle").val(data.story_title);
            $("#storyContent").text(data.story_paragraph);
        });
        e.preventDefault();
    });

    $(".selectStatistic").click(function(e){
        $.get("cms_fetch_data.php?content=statistic&getData=" + $(this).attr("id"), function(data){
            $("#statisticId").val(data.statistic_id);
            $("#statisticContent").text(data.statistic_desc);
        });
        e.preventDefault();
    });
});