# !!...Email Notification Server Started...!!

import pymongo
import smtplib
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText
from pymongo import MongoClient

def operation():
	while(1):
		client=MongoClient()
		db=client['dvis']
		collection=db['pendinginfo']
		data=db['userdata']
		cursor = collection.find()
		search=data.find()
		for document in cursor:
			fname=document["firstname"]
			lname=document["lastname"]
			location=document["location"]
			mail_id=document["mail"]
			for info in search:
				if fname==info["firstname"] and lname==info["lastname"] and location==info["location"]:
					msg_info=info["firstname"] + " " + info["lastname"]+ " is safe at: " + info["info"]
					print msg_info 
					call_mail(mail_id,msg_info)
					collection.delete_one({"firstname":fname,"lastname":lname,"location":location})


def call_mail(mail_id,info):

	fromaddr = "vivekthakur1992@gmail.com"
	toaddr = mail_id
	msg = MIMEMultipart()
	msg['From'] = fromaddr
	msg['To'] = toaddr
	msg['Subject'] = "Victim Information"
	
	body = info
	msg.attach(MIMEText(body, 'plain'))
	
	server = smtplib.SMTP('smtp.gmail.com', 587)
	server.ehlo()
	server.starttls()
	server.ehlo()
	server.login("vivekthakur1992@gmail.com", "*********")
	text = msg.as_string()
	server.sendmail(fromaddr, toaddr, text)
	print "mail is sent to: " + toaddr


if __name__=="__main__":

	print "!!..Email Notification Server Started..!!"
	operation()
	
