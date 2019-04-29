function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('íäÇíÑ', 'İÈÑÇíÑ', 'ãÇÑÓ', 'ÅÈÑíá', 'ãÇíæ', 'íæäíÉ', 'íæáíæ', 'ÃÛÓØÓ', 'ÓÈÊãÈÑ', 'ÃßÊæÈÑ', 'äæİãÈÑ', 'ÏíÓãÈÑ');
        d = date.getDate();
        day = date.getDay();
        days = new Array('ÇáÇÍÏ', 'ÇáÇËäíä', 'ÇáËáÇËÇÁ', 'ÇáÇÑÈÚÇÁ', 'ÇáÎãíÓ', 'ÇáÌãÚÉ', 'ÇáÓÈÊ');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' - '+d+' - '+months[month]+' - '+year+'   '+'<img class="date" src="../img/20.svg" border="1" width = 10% alt="Image 03" /> '+'  '+h+':'+m+'';
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}