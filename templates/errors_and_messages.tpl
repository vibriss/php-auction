{foreach $errors as $error}
    <div style="color:red">{$error}</div> 
{/foreach}
{foreach $warnings as $warning}
    <div style="color:orange">{$warning}</div> 
{/foreach}
{foreach $messages as $message}
    <div style="color:green">{$message}</div> 
{/foreach}