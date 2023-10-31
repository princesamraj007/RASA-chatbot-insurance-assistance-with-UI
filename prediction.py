import random

def recommend(sex,age):
    on = ""
    off = ""
    sum = ""
    age = int(age)
    sex = sex.lower()

    
    if(age < 15):
        on = "You are too young but still you can go for LIC arogya for premium 810"
    if sex == "male":
        if(age <= 20 and age >= 15):
            on = "You can go for LIC arogya for premium 1922"
        elif(age <= 30 and age > 20):
            on = "You can go for LIC arogya for premium 2242"
        elif(age <= 40 and age > 30):
            on = "You can go for LIC arogya for premium 2799"
        elif(age <= 50 and age > 40):
            on = "You can go for LIC arogya for premium 3768"
    elif(sex == "female"):
        if(age <= 20 and age >= 15):
            on = "You can go for LIC arogya for premium 1393"
        elif(age <= 30 and age > 20):
            on = "You can go for LIC arogya for premium 1730"
        elif(age <= 40 and age > 30):
            on = "You can go for LIC arogya for premium 2240"
        elif(age <= 50 and age > 40):
            on = "You can go for LIC arogya for premium 2849"
    
    if age <=35:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 7000"    
    elif age>35 and age<=45:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 8075"
    elif age>45 and age <= 50:
        off = "\n                                                                Star Insurance\n For Yearly\n Claimable Amount - 500000  Premium - 13200"
    elif age>50 and age<=55:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 16100"
    elif age>55 and age <=60:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 7015"
    elif age>60 and age<=65:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 8903"
    elif age>65:
        off = "\n                                                                Star Insurance\nFor Yearly\nClaimable Amount - 500000  Premium - 9015"

    sum = on + off
    
    return sum
    




