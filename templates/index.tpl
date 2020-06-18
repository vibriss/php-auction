{include file ="user_login.tpl"}
{if $user->is_logged_in()}
    <div><a href="user_lots.php">мои лоты</a></div>
{/if}
<div><a href="inactive_lots.php">неактивные лоты</a></div>
{include file = "lot_list/main.tpl"}