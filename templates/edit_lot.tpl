<form method="POST" action="action_edit.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{$lot->get_id()}">
    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                {*    название*<input name="name" type="text" required="required"><br>*}
                название*
            </td>
            <td>
                <input name="name" type="text" value="{$lot->get_name()}">
            </td>
        </tr>
        <tr>
            <td>
                описание
            </td>
            <td>
                <input name="description" type="text" value="{$lot->get_description()}">
            </td>
        </tr>
        <tr>
            <td>
                {*    начальная цена*<input name="price" type="text" value="0" required="required" pattern="[0-9]"><br>*}
                начальная цена*
            </td>
            <td>   
                поменять нельзя
            </td>
        </tr>
        <tr>
            <td>
                длительность
            </td>
            <td>   
                поменять нельзя
            </td>
        </tr>
        <tr>
            <td> 
                {if !empty($lot->get_images())}
                    {foreach $lot->get_images() as $image}
                        <a href="show_image.php?id={$image->get_id()}" target="_blank"><img src="{$image->get_path()}" width="200"></a>
                        <input type="checkbox" name="image_id[]" value="{$image->get_id()}">
                    {/foreach}
                {else}
                    картинки отсутствуют   
                {/if}
            </td>
            <td>     
                <input type="file" name="file[]" multiple="true">
            </td>
        </tr>    
    </table>
    <button type="submit" name="submit_edit">сохранить</button>
    {include file ="errors_and_messages.tpl"}
</form>   
<div><a href="user_lots.php">вернуться</a></div>