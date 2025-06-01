from scrapy import Spider
import json
import re

class JumiaSpider(Spider):
    name = "raneen"
    allowed_domains = ["www.raneen.com",]
    start_urls = ["https://www.raneen.com/",]
    file_name = 'raneen'
    file_path =  r'C:\xampp\htdocs\Budgetko\public\asset\json\\'
    keyword = ''
    page = 1
    products = {'site': 'raneen'}
    products_list = []
    def __init__(self, keyword='', lang='en', path='', **kwargs):
        self.keyword = keyword
        self.file_name += '_' + lang
        self.file_path += path + self.file_name + '_' + keyword
        keyword = keyword.replace(' ', '+')
        self.start_urls = [f'https://www.raneen.com/en/catalogsearch/result/?q={keyword}']
        if lang == 'ar':
            self.start_urls = [f'https://www.raneen.com/ar/catalogsearch/result/?q={keyword}']
        super().__init__(**kwargs)

    def parse(self, response):

        self.parse_items(response)

        while self.page <= 2:
            self.page +=1
            new_page = f'{self.start_urls[0]}&p={self.page}'
            yield response.follow(new_page, callback=self.parse)


    def parse_items(self, response):

        items = response.css('div.product-item-info')
        for item in items:
            name = item.css('a.product-item-link::text').get()
            link = item.css('a.product-item-link').attrib.get('href')
            price = item.css('span.price::text').get()
            if price:
                price = re.sub('[a-zA-Z]', '', price.split('-')[0])
            image = item.css('img.product-image-photo').attrib.get('src')
            if name and link and price and image:
                self.products_list.append(
                    {
                        'name': name,
                        'link': link,
                        'price': price,
                        'image': image
                        }
                    )
        self.products['products'] = self.products_list

        with open(self.file_path+".json", "w") as outfile:
            json.dump(self.products, outfile)
