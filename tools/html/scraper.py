# taken from http://docs.python-guide.org/en/latest/scenarios/scrape/

from lxml import html
import requests

visited = []
results = []

def parsePage(url):
    global visited, results

    page = requests.get(url)
    tree = html.fromstring(page.content)

    # <div title="buyer-name">Carson Busses</div>
    # <span class="item-price">$29.95</span>

    buyers = tree.xpath('//div[@title="buyer-name"]/text()')
    prices = tree.xpath('//span[@class="item-price"]/text()')

    results += zip(buyers, prices)

    # mark page as visited
    visited.append(url)

    # parse the anchor tages to get other pages
    for anchor in tree.xpath('/html/body/div[1]/a'):
        if anchor.attrib["href"] not in visited:
            parsePage(anchor.attrib["href"])


parsePage('http://econpy.pythonanywhere.com/ex/001.html')
print results
