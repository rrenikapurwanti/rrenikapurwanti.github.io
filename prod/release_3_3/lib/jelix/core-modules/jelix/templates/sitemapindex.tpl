{foreach $sitemaps as $sitemap}
    <sitemap>
        <loc>{$sitemap->loc|escxml}</loc>
        {if $sitemap->lastmod}<lastmod>{$sitemap->lastmod|escxml}</lastmod>{/if}

    </sitemap>
{/foreach}
{* endtag is generated by the response *}