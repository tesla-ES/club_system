function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('�����', '������', '����', '�����', '����', '�����', '�����', '�����', '������', '������', '������', '������');
        d = date.getDate();
        day = date.getDay();
        days = new Array('�����', '�������', '��������', '��������', '������', '������', '�����');
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