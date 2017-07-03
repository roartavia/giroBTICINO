Sub getInserts()
    Dim cuentasSheet As Worksheet
    Set cuentasSheet = ThisWorkbook.Worksheets("CuentasCR")
    Dim outPutSheet As Worksheet
    Set outPutSheet = Sheets("InsertCuentas")
    Dim lastRow As Long
    lastRow = cuentasSheet.Cells(cuentasSheet.Rows.Count, "A").End(xlUp).Row
    MsgBox lastRow
    Dim i As Integer
    Dim nombre As String, tipo As String, subtipo As String, telefono As String
    Dim sitioWeb As String, paisFisico As String, provincia As String, canton As String
    Dim zona As String, direccion As String, latitud As String, longitud As String, descripcion As String
    For i = 2 To lastRow
        nombre = Cells(i, "A").Value
        nombre = Replace(nombre, "\", "\\")
        nombre = Replace(nombre, "'", "\'")
        tipo = Cells(i, "B").Value
        tipo = Replace(tipo, "\", "\\")
        tipo = Replace(tipo, "'", "\'")
        subtipo = Cells(i, "C").Value
        subtipo = Replace(subtipo, "\", "\\")
        subtipo = Replace(subtipo, "'", "\'")
        telefono = Cells(i, "D").Value
        telefono = Replace(telefono, "\", "\\")
        telefono = Replace(telefono, "'", "\'")
        sitioWeb = Cells(i, "E").Value
        sitioWeb = Replace(sitioWeb, "\", "\\")
        sitioWeb = Replace(sitioWeb, "'", "\'")
        paisFisico = Cells(i, "F").Value
        paisFisico = Replace(paisFisico, "\", "\\")
        paisFisico = Replace(paisFisico, "'", "\'")
        provincia = Cells(i, "G").Value
        provincia = Replace(provincia, "\", "\\")
        provincia = Replace(provincia, "'", "\'")
        canton = Cells(i, "H").Value
        canton = Replace(canton, "\", "\\")
        canton = Replace(canton, "'", "\'")
        zona = Cells(i, "I").Value
        zona = Replace(zona, "\", "\\")
        zona = Replace(zona, "'", "\'")
        direccion = Cells(i, "J").Value
        direccion = Replace(direccion, "\", "\\")
        direccion = Replace(direccion, "'", "\'")
        descripcion = Cells(i, "K").Value
        descripcion = Replace(descripcion, "\", "\\")
        descripcion = Replace(descripcion, "'", "\'")
        latitud = Cells(i, "L").Value
        longitud = Cells(i, "M").Value
        Dim sqlInsertStr as String
        sqlInsertStr = "INSERT INTO cuentas (nombre,tipo,subtipo,telefono,sitioWeb,paisFisico,provincia,canton,zona,direccion,latitud,longitud,descripcion) values (" & "'" & nombre & "'," & "'" & tipo & "'," & "'" & subtipo & "'," & "'" & telefono & "'," & "'" & sitioWeb & "'," & "'" & paisFisico & "'," & "'" & provincia & "'," & "'" & canton & "'," & "'" & zona & "'," & "'" & direccion & "'," & "'" & latitud & "'," & "'" & longitud & "'," & "'" & descripcion & "');"
        outPutSheet.Cells(i, "A").Value = sqlInsertStr
    Next i
End Sub


Sub getInserts()
    Dim cuentasSheet As Worksheet
    Set cuentasSheet = ThisWorkbook.Worksheets("contactos gua")
    Dim outPutSheet As Worksheet
    Set outPutSheet = Sheets("InsertCuentas")
    Dim lastRow As Long
    lastRow = cuentasSheet.Cells(cuentasSheet.Rows.Count, "A").End(xlUp).Row
    MsgBox lastRow
    Dim i As Integer
    Dim nombre As String, tipo As String, subtipo As String, telefono As String
    Dim sitioWeb As String, paisFisico As String, provincia As String, canton As String
    Dim zona As String, direccion As String, latitud As String, longitud As String, descripcion As String
    For i = 2 To lastRow

    nombreCuenta = Cells(i, "A").Value
    nombreCuenta = Replace(nombreCuenta, "\", "\\")
    nombreCuenta = Replace(nombreCuenta, "'", "\'")

    nombre = Cells(i, "B").Value
    nombre = Replace(nombre, "\", "\\")
    nombre = Replace(nombre, "'", "\'")

    apellidos = Cells(i, "C").Value
    apellidos = Replace(apellidos, "\", "\\")
    apellidos = Replace(apellidos, "'", "\'")

    perfilContactoCargo = Cells(i, "D").Value
    perfilContactoCargo = Replace(perfilContactoCargo, "\", "\\")
    perfilContactoCargo = Replace(perfilContactoCargo, "'", "\'")

    telefono = Cells(i, "F").Value
    telefono = Replace(telefono, "\", "\\")
    telefono = Replace(telefono, "'", "\'")

    correo = Cells(i, "G").Value
    correo = Replace(correo, "\", "\\")
    correo = Replace(correo, "'", "\'")

    pais = Cells(i, "H").Value
    pais = Replace(pais, "\", "\\")
    pais = Replace(pais, "'", "\'")

    provincia = Cells(i, "I").Value
    provincia = Replace(provincia, "\", "\\")
    provincia = Replace(provincia, "'", "\'")

    canton = Cells(i, "J").Value
    canton = Replace(canton, "\", "\\")
    canton = Replace(canton, "'", "\'")

    zona = Cells(i, "K").Value
    zona = Replace(zona, "\", "\\")
    zona = Replace(zona, "'", "\'")

    direccion = Cells(i, "L").Value
    direccion = Replace(direccion, "\", "\\")
    direccion = Replace(direccion, "'", "\'")

    asistente = Cells(i, "M").Value
    asistente = Replace(asistente, "\", "\\")
    asistente = Replace(asistente, "'", "\'")

    telefonoAsistente = Cells(i, "N").Value
    telefonoAsistente = Replace(telefonoAsistente, "\", "\\")
    telefonoAsistente = Replace(telefonoAsistente, "'", "\'")

    descripcion = Cells(i, "O").Value
    descripcion = Replace(descripcion, "\", "\\")
    descripcion = Replace(descripcion, "'", "\'")

        Dim sqlInsertStr as String
        sqlInsertStr = "INSERT INTO contactos (nombreCuenta,nombre,apellidos,perfilContactoCargo,telefono,correo,pais,provincia,canton,zona,asistente,telefonoAsistente,descripcion) values (" & "'" & nombreCuenta & "'," & "'" & nombre & "'," & "'" & apellidos & "'," & "'" & perfilContactoCargo & "'," & "'" & telefono & "'," & "'" & correo & "'," & "'" & pais & "'," & "'" & provincia & "'," & "'" & canton & "'," & "'" & zona & "'," & "'" & asistente & "'," & "'" & telefonoAsistente & "'," & "'" & descripcion & "');"
        outPutSheet.Cells(i, "A").Value = sqlInsertStr
    Next i
End Sub
