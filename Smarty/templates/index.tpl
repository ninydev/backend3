{include file="header.tpl"}

<h1>
    Hello World
</h1>
<p> Hello {$Name} </p>
<div class="alert-info">
    <ul>
        {foreach from=$States item=State}
            <li>{$State}</li>
        {/foreach}
    </ul>
</div>
{if isset($msgError) }
    <div class="alert-danger">{$msgError}</div>
{/if}

{include file="footer.tpl"}
