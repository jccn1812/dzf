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
    row = cursor.fetchone()

    try:
        cursor.callproc('sp_tester',(rut,razon,fecha,neto,iva))
        bd.commit()
    except mysql.connector.Error as error:
        print("Error mysql : {}".format(error))
        bd.rollback()
    except mysql.DataError as e:
        print("DataError")
        print(e)
    except mysql.InternalError as e:
        print("InternalError")
        print(e)
    except mysql.IntegrityError as e:
        print("IntegrityError")
        print(e)
    except mysql.OperationalError as e:
        print("OperationalError")
        print(e)
    except mysql.NotSupportedError as e:
        print("NotSupportedError")
        print(e)
    except mysql.ProgrammingError as e:
        print("ProgrammingError")
        print(e)
    except :
        print("Unknown error occurred")
    finally:
        # cierra la conexión.
        if (bd.is_connected()):
            cursor.close()
            bd.close()
            #print("connection is closed")  

    
    print ("devuelta")
    print (row)
    return row

#Chequea lo valores numericos
def emptyToCero(variable):
    if variable =="" : variable = 0
    return variable



#-----------------------------------------------------------------------------------
nombreArchivo = "RCV_COMPRA_REGISTRO_76645670-7_201801.csv"
archivo = abreArchivo(nombreArchivo)

__rut__         =  2
__razon__       =  3
__fecha__       =  5
__neto__        =  9
__iva__         = 10
__total__       = 14
__ivanor__      = 12
__netoacf__     = 15
__ivaactf__     = 16
__ivacomun__    = 17
__imptosinder__ = 18
__ivanoreten__  = 19
__otroimpto__   = 25


cuenta = 0

for linea in archivo:
    cuenta = cuenta + 1
    if cuenta==1:
       continue

    listaLinea  = linea.split(";")
    rut         = listaLinea[__rut__] 
    razon       = listaLinea[__razon__]
    fecha       = listaLinea[__fecha__]
    neto        = int(emptyToCero(listaLinea[__neto__])) + int(emptyToCero(listaLinea[__netoacf__]))
    iva         = int(emptyToCero(listaLinea[__iva__])) + int(emptyToCero(listaLinea[__ivanor__]))
    total       = int(emptyToCero(listaLinea[__total__])) 
    otrosImp    = int(emptyToCero(listaLinea[__imptosinder__])) + int(emptyToCero(listaLinea[__otroimpto__]))
    otrosImp2   = int(emptyToCero(listaLinea[__ivanoreten__])) 

    resultado = insertSP(rut,razon,fecha,neto,iva)
    print ("Resultado SP ")

    print(resultado)
    

print("Fin Python")

    
        



    
    
