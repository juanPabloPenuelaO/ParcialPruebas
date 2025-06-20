from locust import HttpUser, task, between

class WebsiteUser(HttpUser):
    wait_time = between(1, 3)
    
    @task(2)
    def vista_productos(self):
        self.client.get("/products")

    @task(1)
    def home(self):
        self.client.get("/")
