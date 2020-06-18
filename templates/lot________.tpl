<div>
    <table border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                название
            </td>
            <td>
                {$lot->get_name()}
            </td>
        </tr>
        <tr>
            <td>
                описание
            </td>
            <td>
                {$lot->get_description()}
            </td>
        </tr>
        <tr>
            <td>
                начальная цена
            </td>
            <td>   
                {$lot->get_price()}
            </td>
        </tr>
        {if Bid::get_highest_bid($lot->get_id())}
        <tr>
            <td>
                текущая ставка
            </td>
            <td>   
                {Bid::get_highest_bid($lot->get_id())}
            </td>
        </tr>
        {/if}
        <tr>
            <td>
                {if !$lot->get_time_to_end()}
                    время лота истекло
                {else}
                    время до окончания
            </td>
            <td> 
                    {$lot->get_time_to_end()}
                {/if}
            </td>
        </tr>
        <tr>
            <td>
                {if !empty($lot->get_images())}
                    {foreach $lot->get_images() as $image}
                        <a href="show_image.php?id={$image->get_id()}" target="_blank"><img src="{$image->get_path()}" width="200"></a>
                    {/foreach}
                {else}
                    картинка отсутствует   
                {/if}
            </td>
        </tr>    
    </table>
</div>