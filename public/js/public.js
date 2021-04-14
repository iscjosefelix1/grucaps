$(function() {
  $(".vid").click(function () {
    var theModal = $(this).data("target"),
        videoSRC = $(this).attr("data-video"),
        videoSRCauto = videoSRC + "";
    $('#videoModal').modal({backdrop: 'static', keyboard: false})
    $(theModal + ' source').attr('src', videoSRCauto);
    var vid = document.getElementById("myVideo");
    $(theModal + ' video')[0].load();
    vid.play();
    $(theModal + ' button.close').click(function () {
      // $(theModal + ' video').pause();
      // var vid = document.getElementById("myVideo");
      vid.pause(); 
      $(theModal + ' source').attr('src', videoSRC);
    });
  });
});