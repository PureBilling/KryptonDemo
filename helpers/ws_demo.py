from tools import *

data = {
         "amount": 990,
         "currency": "EUR",
         "customer": {"email": "myemail@email.com"}
       }

answer = call('Charge/CreatePayment', data)
formToken = answer['answer']['formToken']


data = {
         "formToken": formToken,
         "publicKey": ws_public_key,
         "pan":       "4970100000000001",
         "expiryMonth": 5,
         "expiryYear":  2018,
         "securityCode": 123
       }


answer = call('Vault/Public/RegisterCard', data)
tempCard = answer['answer']['id']

data = {
         "publicKey": ws_public_key,
         "temporaryPaymentMethodToken": tempCard,
         "formToken": formToken,
       }

answer = call('Charge/Public/ProcessPayment', data)
bt_id = answer['answer']['billingTransaction']

data = {
         "id": bt_id,
         "propertiesToExpand": ["paymentMethodDetails"]
       }

answer = call('Charge/Get', data)

pp(answer['answer'])

