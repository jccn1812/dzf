import csv
import mysql.connector

#Abre el archivo csv
def abreArchivo(nombreArchivo):
    csvFile = open(nombreArchivo)
    return csvFile

#Conecta la BDD mySql
def getMySqlConnection():
    mydb = mysql.connector.connect(user='root',passwd="mishijos",host="127.0.0.1",database="contableJEE")
    return mydb


#Inserta los valores en la tabla invocando un SP
def insertSP(rut,razon,fecha,neto,iva):
    bd = getMySqlConnection()
    cursor = bd.cursor()

    try:
        cursor.callproc('sp_tester',(rut,razon,fecha,neto,iva))
        bd.commit()
    except mysql.connector.Error as error:
        print("Error mysql : {}".format(error))
        bd.rollback()
    finally:
        # cierra la conexión.
        if (bd.is_connected()):
            cursor.close()
            bd.close()
            #print("connection is closed")  

    return cursor.stored_results()


#-----------------------------------------------------------------------------------
nombreArchivo = "RCV_COMPRA_REGISTRO_76645670-7_201801.csv"
archivo = abreArchivo(nombreArchivo)

__rut__    = 3
__razon__  = 4
__fecha__  = 6
__neto__   = 10
__iva__    = 11
cuenta = 0

for linea in archivo:
    cuenta = cuenta + 1
    if cuenta==1:
       continue
    
    listaLinea = linea.split(";")
    rut   = listaLinea[__rut__] 
    razon = listaLinea[__razon__]
    fecha = listaLinea[__fecha__]
    neto  = listaLinea[__neto__]
    iva   = listaLinea[__iva__]

    resultado = insertSP(rut,razon,fecha,neto,iva)

print("Fin Python")

    
        



    
    
