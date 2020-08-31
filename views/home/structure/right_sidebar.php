<script>
function CBR_XML_Daily_Ru(rates) {
  function trend(current, previous) {
    if (current > previous) return ' <i class="icon-arrow-up7" style="color:green;"></i>';
    if (current < previous) return ' <i class="icon-arrow-down7" style="color:red;"></i>';
    return '';
  }
    
  var USD = document.getElementById('USD');
  USD.innerHTML += trend(rates.Valute.USD.Value, rates.Valute.USD.Previous);

  var EUR = document.getElementById('EUR');
  EUR.innerHTML += trend(rates.Valute.EUR.Value, rates.Valute.EUR.Previous);

  var GBP = document.getElementById('GBP');
  GBP.innerHTML += trend(rates.Valute.GBP.Value, rates.Valute.GBP.Previous);

  var CHF = document.getElementById('CHF');
  CHF.innerHTML += trend(rates.Valute.CHF.Value, rates.Valute.CHF.Previous);
}


$(document).ready(function(){
    $("#showHideContent").click(function () {
        if ($("#content").is(":hidden")) {
            $("#content").show();
        } else {
            $("#content").hide();
        }
        return false;
    });
});

</script>
<script src="//www.cbr-xml-daily.ru/daily_jsonp.js" async></script>

<div class="sidebar sidebar-opposite sidebar-default">
    <div class="sidebar-content">

        <!-- Sidebar search -->
        <div class="sidebar-category">
            <div class="category-title">
                <h4>Быстрый доступ</h4>
            </div>
            <div class="category-title">
                <span>Действия</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>

            <div class="category-content no-padding">
                <ul class="navigation navigation-alt navigation-accordion">
                    <li><a><i class="icon-googleplus5"></i> Создать напоминание</a></li>
                    <li><a><i class="icon-envelop3"></i> Написать поставщику</a></li>
                    <li><a><i class="icon-file-plus"></i> Добавить документ</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-category">
            <div class="category-title">
                <span>Курсы валют</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>

            <div class="category-content no-padding">
                <ul class="nav navigation">
                   <li><a id="EUR">EUR<span class="text-muted text-regular pull-right"><?php echo round($Api->Get_api_CB('')->Valute->EUR->Value, 2);?> р.</span></a></li>
                   <li><a id="USD">USD<span class="text-muted text-regular pull-right"><?php echo round($Api->Get_api_CB('')->Valute->USD->Value, 2);?> р.</span></a></li>
                </ul> 
                <ul class="nav navigation" id="content" style="display:none; margin-top:-20px;"> 

                    <li><a id="GBP">GBP<span class="text-muted text-regular pull-right"><?php echo round($Api->Get_api_CB('')->Valute->GBP->Value, 2);?> р.</span></a></li> 
                     <li><a id="CHF">CHF<span class="text-muted text-regular pull-right"><?php echo round($Api->Get_api_CB('')->Valute->CHF->Value, 2);?> р.</span></a></li> 
                </ul>
                <ul class="icons-list show-more">
                    <li id="showHideContent"><a href="#" data-action="collapse" style="float:left; margin-right: 10px;"></a> Ещё 2 </li>
                </ul>

            </div>
        </div>
        <div class="sidebar-category">
            <div class="category-title">
                <span>Погода</span>
                <ul class="icons-list">
                    <li><i class="icon-plus2"></i></li>
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>

            <div class="category-content no-padding">
                <div class="media-list">
                    <?php echo $Api->Get_api_weather_widget(['Нижний Тагил', 'Новоасбест', 'Кушва','Москва']);?>
                </div>
            </div>
        </div>

    </div>     
</div>