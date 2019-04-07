import mysql.connector
from mysql.connector import Error
from time import sleep
import datetime
import calendar
import statistics
def findHourlyData(cursor):
    def fixit(elem):
        elem=str(elem)
        if len(elem)<=1:
            elem='0'+elem
        return elem
    now= datetime.datetime.now()
    if now.month==1:
        if now.day==1:
            if now.hour==0:
                dFrom = datetime.datetime.strptime(
                    '31/12/' + str(now.year-1)[2:] + ' 23:00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                    '%d/%m/%y %H:%M')
            else:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour-1)+':00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour)+':00',
                '%d/%m/%y %H:%M')
        else:
            if now.hour==0:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 23:00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                    '%d/%m/%y %H:%M')
            else:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour-1)+':00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour)+':00',
                '%d/%m/%y %H:%M')
    else:
        if now.day==1:
            if now.hour==0:
                dFrom = datetime.datetime.strptime(
                    str(calendar.monthrange(now.year,now.month-1)[1]) + '/' + fixit(now.month-1) + '/' + str(now.year)[2:] + ' 23:00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                    '%d/%m/%y %H:%M')
            else:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour-1)+':00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour)+':00',
                '%d/%m/%y %H:%M')
        else:
            if now.hour==0:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 23:00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                    '%d/%m/%y %H:%M')
            else:
                dFrom = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour-1)+':00',
                    '%d/%m/%y %H:%M')
                dTo = datetime.datetime.strptime(
                    fixit(now.day) + '/' + fixit(now.month) + '/' + str(now.year)[2:] +' '+fixit(now.hour)+':00',
                '%d/%m/%y %H:%M')

    cursor.execute("SELECT id,product_id,areacodes_id,bid,amount FROM listings WHERE sold = 1 AND end_of_auction >= %s AND end_of_auction <= %s ;",(dFrom,dTo,))
    return cursor.fetchall()

def findDaylyData(cursor):
    def fixit(elem):
        elem=str(elem)
        if len(elem)<=1:
            elem='0'+elem
        return elem
    now= datetime.datetime.now()
    if now.month==1:
        if now.day==1:
            dFrom = datetime.datetime.strptime(
                '31/12/' + str(now.year)[2:] + ' 00:00',
                '%d/%m/%y %H:%M')
            dTo = datetime.datetime.strptime('31/12/' + str(now.year)[2:] + ' 23:59','%d/%m/%y %H:%M')
        else:
            dFrom = datetime.datetime.strptime(
                fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                '%d/%m/%y %H:%M')
            dTo = datetime.datetime.strptime(
                fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 23:59',
                '%d/%m/%y %H:%M')
    else:
        if now.day==1:
            dFrom = datetime.datetime.strptime(
                str(calendar.monthrange(now.year, now.month - 1)[1]) + '/' + fixit(now.month - 1) + '/' + str(now.year)[2:] + ' 00:00',
                '%d/%m/%y %H:%M')
            dTo = datetime.datetime.strptime(
                str(calendar.monthrange(now.year, now.month - 1)[1]) + '/' + fixit(now.month - 1) + '/' + str(now.year)[2:] + ' 23:59',
                '%d/%m/%y %H:%M')
        else:
            dFrom = datetime.datetime.strptime(
                fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 00:00',
                '%d/%m/%y %H:%M')
            dTo = datetime.datetime.strptime(
                fixit(now.day-1) + '/' + fixit(now.month) + '/' + str(now.year)[2:] + ' 23:59',
                '%d/%m/%y %H:%M')

    cursor.execute("SELECT id,product_id,areacodes_id,bid,amount FROM listings WHERE sold = 1 AND end_of_auction >= %s AND end_of_auction <= %s ;",(dFrom,dTo,))
    return cursor.fetchall()

def daylystat(prodDict):
    ret={}
    for pdid in prodDict.keys():
        try:
            prices = [el[1] / el[0] for el in prodDict[pdid]]
            ret[pdid] = {"totalAmount": sum([el[0] for el in prodDict[pdid]]), "minPrice": min(prices),
                                       "maxPrice": max(prices), "meanPrice": statistics.mean(prices)}
        except ValueError:
            pass
    return ret

def updateStats(connection,cursor,daylyData):
    dataDict = {}
    productsDict = {}
    productsdictByArea = {}
    for prd in [elem[1] for elem in daylyData]:
        productsdictByArea[prd] = {}
        for aid in [elem[2] for elem in daylyData]:
            productsdictByArea[prd][aid] = []
    for elem in daylyData:
        dataDict[elem[0]] = {"product": elem[1], "area": elem[2], "price": elem[3], "amount": elem[4]}
        try:
            productsDict[elem[1]].append([elem[4], elem[3]])
        except KeyError:
            productsDict[elem[1]] = [[elem[4], elem[3]]]
        try:
            productsdictByArea[elem[1]][elem[2]].append([elem[4], elem[3]])
        except KeyError:
            pass

    for i in productsdictByArea.keys():
        productsdictByArea[i] = daylystat(productsdictByArea[i])
    cursor.execute("TRUNCATE TABLE  statshours;")
    for i in productsdictByArea.keys():
        for prd in productsdictByArea[i].keys():
            cursor.execute(
                "INSERT INTO statshours (created_at, updated_at, product_id, areacodes_id, totalamount, minprice, maxprice, meanprice) VALUES (%s, %s, %s, %s, %s, %s, %s, %s);",
                (datetime.datetime.now(), datetime.datetime.now(), prd, i, productsdictByArea[i][prd]['totalAmount'],
                 productsdictByArea[i][prd]['minPrice'],
                 productsdictByArea[i][prd]['maxPrice'], productsdictByArea[i][prd]['meanPrice'],))
            connection.commit()

def main():
    connection=None
    cursor=None
    try:
        connection = mysql.connector.connect(host='10.35.244.148',
                                 database='agrifood',
                                 user='vavamis',
                                 password='vavamispassword')
        if connection.is_connected():

            cursor = connection.cursor()
            cursor.execute("SELECT id,product_id,areacodes_id,bid,amount FROM listings ;")
                                #   0      1        2          3      4
            hourlyData= cursor.fetchall()

            daylyData=findDaylyData(cursor)
            updateStats(connection, cursor, daylyData)





    except Error as e :
        print ("Error while connecting to MySQL", e)
    finally:
        #closing database connection.
        if connection and (connection.is_connected()):
            cursor.close()
            connection.close()
        print("MySQL connection is closed")

if __name__ == '__main__':
    while True:
        nowstm=datetime.datetime.now()
        if nowstm.hour==0 and nowstm.minute<=1:
            main()
            sleep(72000)