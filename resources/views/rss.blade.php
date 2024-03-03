<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>
            <![CDATA[ laranudge.com ]]>
        </title>
        <link>
        <![CDATA[ https://laranudge.com/feed ]]>
        </link>
        <description>
            <![CDATA[ Share your favourite Laravel tips ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($nudges as $nudge)
        <item>
            <title>
                <![CDATA[{{ $nudge->content }}]]>
            </title>
            <description>
                <![CDATA[{!! $nudge->code !!}]]>
            </description>
            <pubDate>{{ $nudge->created_at->toRssString() }}</pubDate>
        </item>
        @endforeach
    </channel>
</rss>
