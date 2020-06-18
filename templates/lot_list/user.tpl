{if count($lot_list) == 0}
    <div>аукционов нет<div/>
{else}
    <form method="POST" action="action_stop_or_delete.php" enctype="multipart/form-data">
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
                            {if Bid::get_highest_bid($lot->get_id())}
                                <tr>
                                    <td>
                                        {if $lot->get_time_to_end()}
                                            лидер
                                        {else}
                                            победитель
                                        {/if}
                                    </td>
                                    <td> 
                                            {$lot->get_winner()->get_login()}
                                    </td>
                                </tr> 
                            {/if}
                            {if $lot->get_time_to_end()}
                                <tr> 
                                    <td> 
                                        <button type="submit" name="submit_stop" value="{$lot->get_id()}">завершить</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                        <div><a href="edit_lot.php?lot={$lot->get_id()}">редактировать</a></div>
                                    </td>
                                </tr>
                            {/if}
                            <tr> 
                                <td>
                                    <button type="submit" name="submit_delete" value="{$lot->get_id()}">удалить</button>
                                </td>
                            </tr>
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