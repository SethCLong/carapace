# taken from http://docs.python-guide.org/en/latest/scenarios/scrape/

from lxml import html
import requests

page = requests.get('http://econpy.pythonanywhere.com/ex/001.html')
tree = html.fromstring(page.content)

# <div title="buyer-name">Carson Busses</div>
# <span class="item-price">$29.95</span>

buyers = tree.xpath('//div[@title="buyer-name"]/text()')
prices = tree.xpath('//span[@class="item-price"]/text()')

print buyers
print prices
