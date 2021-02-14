In this exercice, consider that our network is composed by 10 different websites.

A bit further down, you'll find ZIP file with the Apache logs of the week-end.
Some of our users complained that some websites were slower from time to time.
Some other users even complained that some websites were totally unavailable at some point.

To help you and save some time, please note that the log format is the following:

[IP] [TIME_TO_REPLY (in ms)] - [DATE] "[PROTOCOL] [ENDPOINT] [HTTP_PROTOCOL]" [HTTP_STATUS_CODE] "[REFERER]" "[BROWSER]"

As a preview, this is how logs look like:

215.188.20.60 301751 - [12/Jun/2020:00:42:14 +0000] "GET https//www.domainwebsite6.com/reviews/ HTTP/1.1" 200 "" "Internet Explorer 5"
215.184.24.45 98458 - [12/Jun/2020:02:35:16 +0000] "GET https//www.domainwebsite9.org/? HTTP/1.1" 200 "" "Internet Explorer 8"
146.167.14.112 215318 - [12/Jun/2020:11:27:53 +0000] "GET https//www.domainwebsite9.org/news/my-news.html HTTP/1.1" 404 "" "Internet Explorer 6"
215.182.12.168 99492 - [12/Jun/2020:16:30:54 +0000] "GET https//www.domainwebsite6.com/ HTTP/1.1" 200 "" "Internet Explorer 4"
169.22.21.144 215518 - [12/Jun/2020:18:50:16 +0000] "GET https//www.domainwebsite4.es/ HTTP/1.1" 404 "https://www.google.ca" "Mozilla"
190.189.19.87 215218 - [12/Jun/2020:19:22:41 +0000] "GET https//www.domainwebsite10.net/wp-admin?tryingToHack HTTP/1.1" 200 "https://www.google.ca" "Internet Explorer 4"
215.185.12.208 96945 - [12/Jun/2020:22:36:00 +0000] "GET https//www.domainwebsite2.com/reviews/ HTTP/1.1" 200 "https://www.google.ca" "Netscape"
215.180.15.69 99365 - [13/Jun/2020:02:55:20 +0000] "GET https//www.domainwebsite7.com/ HTTP/1.1" 200 "https://www.google.ca" "MyIE"
215.182.13.64 301783 - [13/Jun/2020:16:22:55 +0000] "GET https//www.domainwebsite5.com/ HTTP/1.1" 200 "https://www.google.ca" "Internet Explorer 7"
194.51.18.104 215218 - [13/Jun/2020:21:09:20 +0000] "GET https//www.domainwebsite4.es/? HTTP/1.1" 200 "https://www.google.ca" "Mozilla"
215.182.13.14 1979020 - [13/Jun/2020:23:08:44 +0000] "GET https//www.domainwebsite8.io/news/my-news.html HTTP/1.1" 200 "" "SearchBot"


Your task:
1/ Suggest a process to make the team logs parsing and visualisation easy for anyone (for example: using GoAccess, what reports would you provide to the team?)
2/ Analyse the attached logs to find out when were the website slow and when they were unavailable.