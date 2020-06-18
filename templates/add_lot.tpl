<form method="POST" action="action_add_lot.php" enctype="multipart/form-data">
    <table border="1" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                {*    название*<input name="name" type="text" required="required"><br>*}
                название*
            </td>
            <td>
                <input name="name" type="text">
            </td>
        </tr>
        <tr>
            <td>
                описание
            </td>
            <td>
                <input name="description" type="text">
            </td>
        </tr>
        <tr>
            <td>
                {*    начальная цена*<input name="price" type="text" value="0" required="required" pattern="[0-9]"><br>*}
                начальная цена*
            </td>
            <td>   
                <input name="price" type="text" value="0">
            </td>
        </tr>
        <tr>
            <td>
                длительность
            </td>
            <td>   
                <select name="lifetime">
                    <option value="60" selected>1 час</option>
                    <option value="120">2 часа</option>
                    <option value="180">3 часа</option>
                    <option value="1">1 минута</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                изображение
            </td>
            <td>     
                <input type="file" name="file[]" multiple="true">
            </td>
        </tr>    
    </table>
    <button type="submit" name="submit_add">добавить</button>
    {include file ="errors_and_messages.tpl"}
</form>   