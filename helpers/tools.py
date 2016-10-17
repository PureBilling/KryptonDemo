import simplejson
import requests
requests.packages.urllib3.disable_warnings()
import json
from pygments import highlight
from pygments.lexers import JsonLexer
from pygments.formatters import TerminalFormatter

ws_base_url = 'https://payzen-q09.lyra-labs.fr/api-payment/V3'
ws_private_key = 'demo:testprivatekey_DEMOPRIVATEKEY23G4475zXZQ2UA5x7M'
ws_public_key = 'demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5'


def pp(json_object):
    json_str = json.dumps(json_object, indent=4, sort_keys=True)
    print(highlight(json_str, JsonLexer(), TerminalFormatter()))

def call( path, data):

        url = ws_base_url + "/"+path

        json = requests.post(url=url, json=data, verify=False, auth=tuple(ws_private_key.split(':')))

        try:
            r = simplejson.loads(json.text)
            return r
        except:
            pass

        if json.status_code != 200:
            raise Exception("Core server return a %s errorCode" % json.status_code)

        raise Exception("can't process answer: %s" % json.text)
