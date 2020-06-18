{if count($lot_list) == 0}
    <div>активных аукционов нет<div/>
{else}
    {include file ="errors_and_messages.tpl"}
    <form method="POST" action="action_bid.php" enctype="multipart/form-data">
        <table border="1" cellspacing="20" cellpadding="10">
            <tr>
                {foreach $lot_list as $key => $lot}
                    <td>
                        <table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td valign = "top">
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
                            {if ($lot->get_user_id() != $user->get_id()) && $lot->get_time_to_end() && $user->is_logged_in()}
                                <tr>
                                    <td>
                                        <input type="hidden" name="id" value="{$lot->get_id()}">
                                        <input type="text" name="bid">
                                    </td>
                                    <td> 
                                        <button type="submit">сделать ставку</button>
                                    </td>
                                </tr>   
                            {/if}
                        </table>    
                    </td>
                {if ($key + 1) is div by 2}
                    </tr><tr>
                {/if}
            {/foreach}
            </tr>
        </table>
    </form> 
{/if}