# Етап 1: Збірка
FROM node:18 AS build
WORKDIR /app
COPY package.json ./
RUN npm install
COPY . .
RUN npm run build

# Етап 2: Сервірування
FROM nginx:alpine
COPY --from=build /app/dist /usr/share/nginx/html
COPY index.html /usr/share/nginx/html/
# Команда виконується під час створення образу:
RUN sed -i 's/80/8088/g' /etc/nginx/conf.d/default.conf
EXPOSE 8088
