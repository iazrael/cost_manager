<?php
    /**
     * cost manager
     **/
    require_once('server/check-right.php');
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
        <h2 class="title">cost manager<span class="version">beta</span></h2>
        <div class="session">
            <h2 class="title">list</h2>
            <table id="costTable" class="cost-table">
                <thead>
                    <tr>
                        <th class="no"></th>
                        <th class="cost-time">消费时间</th>
                        <th class="name">消费项目</th>
                        <th class="amount">价格</th>
                        <th class="average-people">平摊人</th>
                        <th class="payer">付款人</th>
                        <th class="remark">备注</th>
                    </tr>
                </thead>
                <tbody>
<script id="listTmpl" type="text/plain">
    <% for(var i in list){ %>
                    <tr>
                        <td class="no"><%=index++ %></td>
                        <td class="cost-time"><%=list[i].costtime %></td>
                        <td class="name"><%=list[i].purchase %></td>
                        <td class="amount"><%=list[i].amount %></td>
                        <td class="average-people">
        <% for(var j in list[i].averagepeople){ %> 
                            <span><%=list[i].averagepeople[j]%></span>
        <% } %>
                        </td>
                        <td class="payer"><%=list[i].payer %></td>
                        <td class="remark"><%=list[i].remark %></td>
                    </tr>
    <% } %>
</script>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="no"></td>
                        <td class="cost-time"><input id="costTime" name="cost-time" type="date" pattern="\d{4}-\d{1,2}-\d{1,2}"></td>
                        <td class="name"><input id="purchase" type="text"></td>
                        <td class="amount"><input id="amount" type="text"></td>
                        <td class="average-people">
                            <select id="averagePeople" multiple>
                                <option value="azrael">azrael</option>
                                <option value="cece">cece</option>
                                <option value="mia">mia</option>
                            </select>
                        </td>
                        <td class="payer">
                            <select id="payer">
                                <option value="azrael">azrael</option>
                                <option value="cece">cece</option>
                                <option value="mia">mia</option>
                            </select>
                        </td>
                        <td class="remark"><textarea id="remark"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="cost-action">
                            <button id="addRecord" cmd="addRecord">save</button>
                            <!--<button id="clearing" cmd="clearing">clearing</button>-->
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="session">
            <h2 class="title">clearing</h2>
            <div id="clearingResult" class="clearing-result">
<script id="clearingTmpl" type="text/plain">
    <% 
    var income, outcome, result;
    for(var i in list){ 
        income = Math.round(list[i].income * 100) / 100;
        outcome = Math.round(list[i].outcome * 100) / 100;
        result = Math.round((income - outcome) * 100) / 100;
    %>
                <p>
                    <span class="name"><%=i %></span>
                    <span class="equal">=</span>
                    <span class="plus">+</span>
                    <span class="amount"><%=income.format('#.00') %></span>
                    <span class="minus">-</span>
                    <span class="amount"><%=outcome.format('#.00') %></span>
                    <span class="equal">=</span>
                    <span class="result"><%=result.format('#.00') %></span>
                </p>
    <% } %>
</script>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/cost.js"></script>
</body>
</html>