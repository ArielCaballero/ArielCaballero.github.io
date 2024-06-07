$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    usernamea=$("#usernamea").val();
    clavea=$("#clavea").val();

    $.post("../ajax/usuarios.php?op=verificar",
        {"usernamea":usernamea,"clavea":clavea},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","inicio.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    });
})