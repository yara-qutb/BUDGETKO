from scrapy import Spider
import json
import re

class JumiaSpider(Spider):
    name = "jumia"
    allowed_domains = ["www.jumia.com.eg",]
    start_urls = ["https://www.jumia.com.eg",]
    file_name = 'jumia'
    file_path =  r'C:\xampp\htdocs\Budgetko\public\asset\json\\'
    keyword = ''
    page = 1
    products = {'site': 'jumia'}
    products_list = []
    def __init__(self, keyword='', lang='en', path='', **kwargs):
        self.keyword = keyword
        self.file_name += '_' + lang
        self.file_path += path + self.file_name + '_' + keyword
        keyword = keyword.replace(' ', '+')
        self.start_urls = [f'https://www.jumia.com.eg/catalog/?q={keyword}']
        if lang == 'ar':
            self.start_urls = [f'https://www.jumia.com.eg/ar/catalog/?q={keyword}']
        super().__init__(**kwargs)

    def parse(self, response):

        self.parse_items(response)

        while self.page <= 1:
            self.page +=1
            new_page = f'{self.start_urls[0]}&page={self.page}'
            yield response.follow(new_page, callback=self.parse)


    def parse_items(self, response):

        items = response.css('a.core')
        print('items= ', len(items))
        for item in items:
            name = item.css('a.core').attrib.get('data-gtm-name')
            link = 'https://www.jumia.com.eg' + item.css('a.core').attrib.get('href')
            price = re.sub('[a-zA-Z]', '', item.css('div.prc::text').get().split('-')[0])
            image = item.css('img.img').attrib.get('data-src')
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
