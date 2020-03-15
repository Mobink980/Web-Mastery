'use strict';
function load() {
    var feed = "http://feeds.bbci.co.uk/news/world/rss.xml";
    new GFDynamicFeedControl (feed, 'feedControl');
}

google.load("feeds", "1");
google.setOnLoadCallback(load);





























