jQuery(document).ready(function ($) {
  $(".reddit-share-icon").on("click", function () {
    var postTitle = $(this).data("title");
    var postUrl = $(this).data("url");
    var subreddit = $("#reddit-subreddit").val().trim();

    if (subreddit === "") {
      alert("Please enter a subreddit.");
      return;
    }

    var redditUrl =
      "https://www.reddit.com/r/" +
      encodeURIComponent(subreddit) +
      "/submit?url=" +
      encodeURIComponent(postUrl) +
      "&title=" +
      encodeURIComponent(postTitle);
    window.open(redditUrl, "_blank");
  });
});
