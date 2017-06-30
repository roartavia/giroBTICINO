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
