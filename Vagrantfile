# -*- mode: ruby -*-
# vi: set ft=ruby :

$system_setup = <<-SHELL
	apt-get update
	curl -fsSL https://get.docker.com -o get-docker.sh
	sh get-docker.sh
	systemctl status docker
	systemctl start docker
	docker run hello-world
	
SHELL

Vagrant.configure("2") do |config|
	config.vm.box = "ubuntu/jammy64"
	
	nodes = [
		{ name: "DevOpsP", ip: "192.168.56.111", port: 8080, role: "DevOpsP" }
	]
	
	nodes.each do |node_info|
		config.vm.define node_info[:name] do |node|
			node.vm.hostname = node_info[:name]
			node.vm.network "private_network", ip: node_info[:ip]
			node.vm.network "forwarded_port", guest: 80, host: node_info[:port]
			
			node.vm.provider "virtualbox" do |vb|
				vb.name = node_info[:name]
				vb.memory = "2048"
				vb.cpus = 2
			end
			
			if node_info[:role] == "DevOpsP"
				node.vm.provision "shell", inline: $system_setup
				config.vm.provision "file", source: "./", destination: "project"
			end
		end
	end
end