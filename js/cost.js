;jQuery(function($){
    var $costTime = $('#costTime');
    var $purchase = $('#purchase');
    var $amount = $('#amount');
    var $averagePeople = $('#averagePeople');
    var $payer = $('#payer');
    var $remark = $('#remark');
    var $addRecord = $('#addRecord');
    var $costTable = $('#costTable');
    var $clearingResult = $('#clearingResult');
    
    var statics = {};
    
    var getActionTarget = function(event, level, property, parent){
        var t = event.target,
            l = level || 3,
            s = level !== -1,
            p = property || 'cmd',
            end = parent || document.body;
        while(t && (t !== end) && (s ? (l-- > 0) : true)){
            if(t.getAttribute(p)){
                return t;
            }else{
                t = t.parentNode;
            }
        }
        return null;
    }
    
    var templateCache = {};
    
    var getTemplate = function(id){
        if(templateCache[id]){
            return templateCache[id];
        }
        var node = document.getElementById(id);
        if(node){
            templateCache[id] = node.innerHTML;
            node.parentNode.removeChild(node);
            return templateCache[id];
        }else{
            return null;
        }
    }
    
    var addNewRecord = function(){
        var costTime = $costTime.val().trim();
        var purchase = $purchase.val().trim();
        var amount = $amount.val().trim();
        var averagePeople = $.trim($averagePeople.val());
        var payer = $payer.val().trim();
        var remark = $remark.val().trim();
        if(!costTime){
            alert('请填上购买的实际');
            return;
        }
        if(!/^\d{4}-\d{1,2}-\d{1,2}$/.test(costTime)){
            alert('时间格式不对');
            return;
        }
        if(!purchase){
            alert('请填上购买的物品');
            return;
        }
        if(!amount){
            alert('请填上价格');
            return;
        }
        if(!/^\d+(\.\d+)?$/.test(amount)){
            alert('价格必须是数字');
            return;
        }
        if(!averagePeople){
            alert('请选择平摊人');
            return;
        }
        if(averagePeople.split(',').length < 2){
            alert('一个人平摊什么?');
            return;
        }
        $addRecord.attr('disabled', 'disabled');
        $.post('server/add-new-record.php', {
            costTime: costTime,
            purchase: purchase,
            amount: amount,
            averagePeople: averagePeople,
            payer: payer,
            remark: remark
        }, function(data){
            $addRecord.removeAttr('disabled');
            if(data.success){
                var $tbody = $costTable.children('tbody');
                var tmplStr = getTemplate('listTmpl');
                averagePeople = averagePeople.split(',');
                var html = String.template(tmplStr, {
                    index: $tbody.children().length + 1,
                    list: [{
                        costtime: costTime,
                        purchase: purchase,
                        amount: amount,
                        averagepeople: averagePeople,
                        payer: payer,
                        remark: remark
                    }]
                });
                $tbody.append($(html).addClass('new-add'));
                var p, avgCount = averagePeople.length;
                for(var j in averagePeople){
                    p = averagePeople[j];
                    statics[p] || (statics[p] = {outcome: 0, income: 0});
                    if(p == payer){
                        statics[p].income += amount * (avgCount - 1) / avgCount;
                    }else{
                        statics[p].outcome += amount * 1 / avgCount;
                    }
                }
                tmplStr = getTemplate('clearingTmpl');
                html = String.template(tmplStr, {
                    list: statics
                });
                $clearingResult.html(html);
                
                $purchase.val('');
                $amount.val('');
                $remark.val('');
                $averagePeople.val('')
            }else{
                alert('失败了');
            }
        });
    }
    
    $(document.body).click(function(e){
        var target = getActionTarget(e, 3, 'cmd');
        if(!target){
            return;
        }
        var cmd = target.getAttribute('cmd');
        switch(cmd){
            case 'addRecord':
                addNewRecord();
                break;
            case 'clearing':
                //clearing();
                break;
            default:
                break;
        }
    });
    
    $.get('server/get-all-records.php', function(data){
            if(data.success){
                var p, avgCount;
                for(var i = 0, record; record = data.records[i]; i++){
                    record.amount = Number(record.amount);
                    record.averagepeople = record.averagepeople.split(',');
                    record.isreconciled = Number(record.isreconciled);
                    avgCount = record.averagepeople.length;
                    for(var j in record.averagepeople){
                        p = record.averagepeople[j];
                        statics[p] || (statics[p] = {outcome: 0, income: 0});
                        if(p == record.payer){
                            statics[p].income += record.amount * (avgCount - 1) / avgCount;
                        }else{
                            statics[p].outcome += record.amount * 1 / avgCount;
                        }
                    }
                }
                var tmplStr = getTemplate('listTmpl');
                var html = String.template(tmplStr, {
                    index: 1,
                    list: data.records
                });
                var $tbody = $costTable.children('tbody');
                $tbody.append(html);
                
                tmplStr = getTemplate('clearingTmpl');
                html = String.template(tmplStr, {
                    list: statics
                });
                $clearingResult.html(html);
            }
        });
    
    // init
    $costTime.val((new Date).format('yyyy-MM-dd'));
});