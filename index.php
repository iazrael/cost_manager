<?php
    /**
     * cost manager
     **/
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>COST</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="wrapper">
        <h2 class="title">cost manager</h2>
        <div class="session">
            <h2 class="title">list</h2>
            <table class="cost-table">
                <thead>
                    <tr>
                        <th class="no"></th>
                        <th class="cost-time">消费时间</th>
                        <th class="name">消费项目</th>
                        <th class="amount">价格</th>
                        <th class="average-people">均摊人</th>
                        <th class="payer">付款人</th>
                        <th class="remark">备注</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    <tr>
                        <td class="no">1</td>
                        <td class="cost-time">2011-12-26</td>
                        <td class="name">电饭锅</td>
                        <td class="amount">199</td>
                        <td class="average-people">
                            <span>mia</span>, 
                            <span>cece</span>, 
                            <span>azrael</span></td>
                        <td class="payer">azrael</td>
                        <td class="remark"></td>
                    </tr>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td class="no"></td>
                        <td class="cost-time"><input name="cost-time" type="date" pattern="\d{4}-\d{1,2}-\d{1,2}"></td>
                        <td class="name"><input type="text"></td>
                        <td class="amount"><input type="text"></td>
                        <td class="average-people">
                            <select multiple>
                                <option>mia</option>
                                <option>cece</option>
                                <option>azrael</option>
                            </select>
                        </td>
                        <td class="payer">
                            <select>
                                <option>mia</option>
                                <option>cece</option>
                                <option>azrael</option>
                            </select>
                        </td>
                        <td class="remark"><textarea></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="cost-action">
                            <button>save</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="session">
            <h2 class="title">clearing</h2>
            <div ></div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
</html>