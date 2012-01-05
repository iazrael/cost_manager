;jQuery(function($){
    var $costTime = $('#costTime');
    var $purchase = $('#purchase');
    var $amount = $('#amount');
    var $averagePeople = $('#averagePeople');
    var $payer = $('#payer');
    var $remark = $('#remark');
    var $addRecord = $('#addRecord');
    var $costTable = $('#costTable');
    
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
    
    var addNewRecord = function(){
        var costTime = $costTime.val().trim();
        var purchase = $purchase.val().trim();
        var amount = $amount.val().trim();
        var averagePeople = $.trim($averagePeople.val());
        var payer = $payer.val().trim();
        var remark = $remark.val().trim();
        if(!costTime || !purchase || !amount || !averagePeople){
            alert('请填完必填项');
            return;
        }
        if(!/^\d+(\.\d+)?$/.test(amount)){
            alert('价格必须是数字');
            return;
        }
        $addRecord.attr('disabled', 'disabled');
        $.post('add-new-record.php', {
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
                $tbody.append('<tr><td class="no">' + ($tbody.children().length + 1)
                    + '</td><td class="cost-time">' + costTime 
                    + '</td><td class="name">' + purchase 
                    + '</td><td class="amount">' + amount 
                    + '</td><td class="average-people">' + averagePeople
                    + '</td><td class="payer">' + payer
                    + '</td><td class="remark">' + remark
                    + '</td></tr>');
                $purchase.val('');
                $amount.val('');
                $remark.val('');
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
            default:
                break;
        }
    });
    
    // init
    $costTime.val((new Date).format('yyyy-MM-dd'));
});