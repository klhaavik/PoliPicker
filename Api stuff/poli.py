import urllib.parse
import urllib.request
import json

class VotesmartApiError(Exception):
    """ Exception for VoteSmart API errors """

class VotesmartApiObject(object):
    def __init__(self, d):
        self.__dict__ = d

    def __repr__(self):
        return f"{self.__class__.__name__}({self.__dict__})"

class Official(VotesmartApiObject):
    def __str__(self):
        return ' '.join((self.title, self.firstName, self.lastName))


def _result_to_obj(cls, result):
    if isinstance(result, dict):
        return [cls(result)]
    else:
        return [cls(o) for o in result if o]


class votesmart(object):
    apikey = '88bda3b6fa27737fd5b2e4655d4a4444'  # Your API key

    @staticmethod
    def _apicall(func, params):
        if votesmart.apikey is None:
            raise VotesmartApiError('Missing Project Vote Smart apikey')

        params = {k: v for k, v in params.items() if v}
        url = f"http://api.votesmart.org/{func}?o=JSON&key={votesmart.apikey}&{urllib.parse.urlencode(params)}"
        try:
            with urllib.request.urlopen(url) as response:
                obj = json.loads(response.read().decode())
                if 'error' in obj:
                    raise VotesmartApiError(obj['error']['errorMessage'])
                else:
                    return obj
        except urllib.error.HTTPError as e:
            raise VotesmartApiError(e)
        except ValueError:
            raise VotesmartApiError('Invalid Response')


class Officials(object):
    @staticmethod
    def getByZip(zip5, zip4=None):
        params = {'zip5': zip5, 'zip4': zip4}
        result = votesmart._apicall('Officials.getByZip', params)
        return _result_to_obj(Official, result['candidateList']['candidate'])

# Example: List of all politicians in Baltimore, MD (ZIP code 21201)
try:
    baltimore_zip = "21201"
    officials = Officials.getByZip(baltimore_zip)
    
    print(f"Officials for ZIP code {baltimore_zip}:")
    for official in officials:
        print(official)
except VotesmartApiError as e:
    print(f"API Error: {e}")
