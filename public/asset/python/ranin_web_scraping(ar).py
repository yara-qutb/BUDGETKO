import requests
from bs4 import BeautifulSoup as bs
import json
import sys


def save_file(data, name):
    with open(name+".json", "w") as outfile:
        json.dump(data, outfile)


def get_raneen_products(keyword):

    headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36'
    }
    url = 'https://www.raneen.com/ar/catalogsearch/result/?q='
    keyword = keyword.replace(' ', '+')
    products = {'site': 'raneen'}
    products_list = []
    path = ''
    file_name = path+'raneen_'+keyword
    for page in range(2, 6):

        if page > 1:
            url = url+keyword+'&p='+str(page)

        else:
            url = url+keyword

        request = requests.get(url+keyword, headers=headers)
        text = bs(request.text, 'html.parser')
        items_list = text.find_all('li', class_="item product product-item")
        for product in items_list:

            try:
                link = product.find('a', class_='product-item-link', href=True)['href']
            except:
                link = None
            try:
                name = product.find('a', class_='product-item-link', href=True).get_text()
            except:
                name = None
            try:
                price = product.find('span', class_='price-wrapper')['data-price-amount']
            except:
                price = None
            try:
                image = product.find('img', class_='product-image-photo')['src']
            except:
                image = None
            try:
                rate = product.find('div', class_='rating-result')['title']
            except:
                rate = None

            print(rate)

            products_list.append(
                    {
                        'name': name,
                        'price': price,
                        'link': link,
                        'image': image,
                        'rate': rate
                    }
            )

    products['products'] = products_list
    save_file(products, file_name)
    return products


if __name__ == "__main__":

    args = sys.argv
    for keyword in args[1:]:
        raneen = get_raneen_products(keyword)
        print(raneen)
