"""
FreelanceHub AI Customer Support Agent
=======================================
A smart, rules-based AI chatbot backend for FreelanceHub.
Handles common customer queries about the freelancing platform.
No external API keys needed — runs fully offline.
"""

from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from sqlalchemy import create_engine, Column, Integer, String, Text, DateTime
from sqlalchemy.orm import sessionmaker, declarative_base
from datetime import datetime
import uvicorn
import re
import random
import json

# ============================================================
# Database Setup
# ============================================================
Base = declarative_base()
engine = create_engine('sqlite:///chat_history.db', echo=False)
SessionLocal = sessionmaker(bind=engine)


class ChatHistory(Base):
    __tablename__ = 'chat_history'
    id = Column(Integer, primary_key=True, index=True)
    session_id = Column(String(100), index=True)
    user_name = Column(String(100))
    user_message = Column(Text)
    bot_response = Column(Text)
    category = Column(String(50))
    created_at = Column(DateTime, default=datetime.utcnow)


Base.metadata.create_all(engine)

# ============================================================
# FastAPI App Setup
# ============================================================
app = FastAPI(
    title="FreelanceHub AI Agent",
    description="Customer support chatbot for FreelanceHub",
    version="2.0.0"
)

# CORS — allow Laravel frontend
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# ============================================================
# Knowledge Base — FreelanceHub Platform Info
# ============================================================
KNOWLEDGE_BASE = {
    "greeting": {
        "keywords": ["hello", "hi", "hey", "good morning", "good evening", "good afternoon",
                      "howdy", "greetings", "sup", "what's up", "yo", "hola", "assalamu"],
        "responses": [
            "Hello! 👋 Welcome to FreelanceHub! I'm your AI assistant. How can I help you today?",
            "Hi there! 😊 I'm the FreelanceHub AI Agent. I can help you with job searches, account queries, payments, and more. What do you need?",
            "Hey! Welcome to FreelanceHub support! 🚀 Ask me anything about our platform.",
        ],
        "suggestions": ["How to find jobs?", "How to register?", "Payment methods", "Contact support"]
    },
    "registration": {
        "keywords": ["register", "sign up", "signup", "create account", "new account",
                      "join", "how to join", "registration"],
        "responses": [
            "📝 **Registering on FreelanceHub is easy!**\n\n1. Click the **Register** button in the top navigation\n2. Fill in your name, email, and password\n3. Complete your profile with skills and experience\n4. Upload your CV/resume\n5. Start browsing and applying for jobs!\n\nNeed help with a specific step?",
        ],
        "suggestions": ["How to update my profile?", "How to upload CV?", "How to apply for jobs?"]
    },
    "login": {
        "keywords": ["login", "log in", "sign in", "signin", "can't login", "forgot password",
                      "password reset", "reset password", "access account"],
        "responses": [
            "🔐 **Login Help:**\n\n• Go to the **Login** page from the top navigation\n• Enter your registered email and password\n• If you forgot your password, click **'Forgot Password'** to receive a reset link via email\n\n**Trouble logging in?** Make sure:\n- Your email is correct\n- Check your CAPS LOCK key\n- Clear your browser cache and try again",
        ],
        "suggestions": ["Forgot my password", "How to register?", "Contact support"]
    },
    "jobs": {
        "keywords": ["job", "jobs", "find job", "search job", "apply", "application",
                      "work", "opportunity", "vacancy", "vacancies", "position", "hire",
                      "looking for work", "available jobs", "browse jobs", "freelance work"],
        "responses": [
            "💼 **Finding & Applying for Jobs on FreelanceHub:**\n\n🔍 **Search Jobs:** Use the search bar on the homepage to find jobs by keyword, category, or location\n\n📂 **Browse Categories:** Click on job categories to filter by your expertise\n\n📩 **Apply:** Click on any job listing → Read the description → Click **'Apply'** → Submit your application with your CV\n\n💾 **Save Jobs:** Bookmark interesting jobs to apply later from your dashboard\n\n📊 **Track Applications:** View all your applications in your profile under 'Applications'",
        ],
        "suggestions": ["How to track my application?", "How to update my CV?", "How to save jobs?"]
    },
    "profile": {
        "keywords": ["profile", "edit profile", "update profile", "my account", "account settings",
                      "change name", "change email", "update details", "personal info"],
        "responses": [
            "👤 **Managing Your Profile:**\n\n1. Log in to your account\n2. Click your **name** in the top-right corner\n3. Select **'Edit Profile'** from the dropdown\n4. Update your information:\n   - Personal details (name, email)\n   - Skills & expertise\n   - Bio & experience\n5. Click **'Save'** to update\n\n💡 **Tip:** A complete profile with a detailed bio gets 3x more responses from employers!",
        ],
        "suggestions": ["How to upload CV?", "How to apply for jobs?", "View my applications"]
    },
    "cv": {
        "keywords": ["cv", "resume", "upload cv", "update cv", "curriculum vitae",
                      "my cv", "edit cv", "portfolio"],
        "responses": [
            "📄 **CV / Resume Management:**\n\n1. Go to your **Profile** → **'Update CV'**\n2. Upload your CV in PDF or DOC format\n3. Make sure your CV includes:\n   - Contact information\n   - Skills & expertise\n   - Work experience\n   - Education\n   - Portfolio links (if applicable)\n\n✨ **Pro Tip:** Keep your CV updated — employers check the latest version when reviewing your applications!",
        ],
        "suggestions": ["How to apply for jobs?", "Edit my profile", "View saved jobs"]
    },
    "payment": {
        "keywords": ["payment", "pay", "money", "salary", "pricing", "cost", "charge",
                      "stripe", "billing", "invoice", "fee", "withdraw", "earning",
                      "transaction", "price"],
        "responses": [
            "💳 **Payments on FreelanceHub:**\n\nWe use **Stripe** for secure payment processing:\n\n• 🔒 All transactions are encrypted and secure\n• 💰 Payments are processed after work completion\n• 📧 You'll receive email confirmations for all transactions\n• 📊 View your payment history in your dashboard\n\n**For payment issues**, please contact our support team through the contact form on this page or email us directly.",
        ],
        "suggestions": ["Contact support", "How does Stripe work?", "Payment not received"]
    },
    "contact_support": {
        "keywords": ["contact", "support", "help", "email", "phone", "call",
                      "reach", "customer service", "speak to human", "real person",
                      "talk to someone", "complaint", "issue", "problem", "bug", "error"],
        "responses": [
            "📞 **Contact FreelanceHub Support:**\n\n📧 **Email:** hello@freelancehub.io\n📱 **Phone:** +1 232 3235 324\n📍 **Address:** 203 Fake St, Mountain View, San Francisco, CA, USA\n\n📝 You can also fill out the **contact form** right here on this page — our team will respond within 24 hours!\n\n💬 For quick answers, feel free to ask me anything — I'm here 24/7!",
        ],
        "suggestions": ["How to register?", "Payment help", "Job search help"]
    },
    "about": {
        "keywords": ["about", "what is freelancehub", "about freelancehub", "what do you do",
                      "company", "who are you", "platform", "tell me about", "what is this"],
        "responses": [
            "🌟 **About FreelanceHub:**\n\nFreelanceHub is the premier community for ambitious independent professionals. We connect talented freelancers with top companies and projects worldwide.\n\n🎯 **Our Mission:** Empower freelancers to find meaningful work and help businesses find the right talent\n\n✅ **What We Offer:**\n- Job listings across multiple categories\n- Secure payment processing via Stripe\n- Profile & CV management\n- Application tracking\n- Direct employer communication\n\nVisit our **About** page for more details!",
        ],
        "suggestions": ["How to get started?", "Browse jobs", "Register now"]
    },
    "categories": {
        "keywords": ["category", "categories", "type of jobs", "job types", "sectors",
                      "fields", "departments", "specialization", "what kind of jobs"],
        "responses": [
            "📂 **Job Categories on FreelanceHub:**\n\nWe have jobs across many categories including:\n\n💻 Web Development\n📱 Mobile Development\n🎨 Design & Creative\n📝 Content Writing\n📊 Data Science & Analytics\n🔧 DevOps & System Admin\n📈 Marketing & SEO\n🎥 Video & Animation\n🤖 AI & Machine Learning\n\nBrowse all categories on our homepage to find jobs matching your skills!",
        ],
        "suggestions": ["Search for jobs", "How to apply?", "Update my skills"]
    },
    "saved_jobs": {
        "keywords": ["saved jobs", "bookmark", "bookmarked", "saved", "favorite jobs",
                      "favourites", "my saved"],
        "responses": [
            "💾 **Saved Jobs:**\n\n• When browsing jobs, click the **Save** button on any listing\n• Access your saved jobs from **Profile → Saved Jobs**\n• Apply to saved jobs anytime\n• Remove saved jobs you're no longer interested in\n\n🔔 **Tip:** Save jobs you like and apply when your profile is complete!",
        ],
        "suggestions": ["How to apply?", "Update my profile", "Browse categories"]
    },
    "application_status": {
        "keywords": ["application status", "track application", "my application", "applied",
                      "accepted", "rejected", "pending", "application result", "status"],
        "responses": [
            "📋 **Checking Your Application Status:**\n\n1. Log in to your account\n2. Click your name → **'Applications'**\n3. View the status of all your applications:\n   - ⏳ **Pending** — Under review\n   - ✅ **Accepted** — Congratulations!\n   - ❌ **Rejected** — Don't worry, keep applying!\n\n📩 You'll also receive email notifications when your application status changes.",
        ],
        "suggestions": ["Apply for more jobs", "Update my CV", "Contact support"]
    },
    "thank_you": {
        "keywords": ["thank", "thanks", "thank you", "thx", "ty", "appreciate",
                      "helpful", "great", "awesome", "nice", "good"],
        "responses": [
            "You're welcome! 😊 I'm glad I could help. Is there anything else you'd like to know about FreelanceHub?",
            "Happy to help! 🌟 Don't hesitate to ask if you have more questions. Good luck with your freelancing journey!",
            "Anytime! 💪 Feel free to reach out whenever you need assistance. We're here for you!",
        ],
        "suggestions": ["Browse jobs", "Update profile", "Contact support"]
    },
    "goodbye": {
        "keywords": ["bye", "goodbye", "see you", "later", "cya", "good night",
                      "take care", "gotta go"],
        "responses": [
            "Goodbye! 👋 Have a great day! Come back anytime you need help.",
            "See you later! 🌟 Wishing you the best on FreelanceHub!",
            "Take care! 😊 Good luck with your projects. We're always here when you need us!",
        ],
        "suggestions": ["Start new conversation"]
    },
    "news": {
        "keywords": ["news", "world wide", "worldwide", "latest news", "updates",
                      "blog", "blogs", "articles"],
        "responses": [
            "📰 **Stay Updated with FreelanceHub:**\n\n• Check our **World Wide** section for the latest global freelancing news\n• Visit our **Blog** section for tips, guides, and industry insights\n• Subscribe to our **Newsletter** (in the footer) for weekly updates\n\nStay informed about the freelancing industry and boost your career!",
        ],
        "suggestions": ["Browse jobs", "Visit blogs", "How to register?"]
    },
    "policy": {
        "keywords": ["privacy", "policy", "privacy policy", "terms", "terms of use",
                      "legal", "data", "gdpr", "data protection"],
        "responses": [
            "📜 **Our Policies:**\n\n🔐 **Privacy Policy:** We take your data privacy seriously. Read our full privacy policy on the Privacy Policy page.\n\n📋 **Terms of Use:** Review our terms of service before using the platform.\n\nBoth are accessible from the footer of any page. Your data is secure with us!",
        ],
        "suggestions": ["Contact support", "About FreelanceHub", "Register"]
    },
}

# Fallback responses when no keyword match
FALLBACK_RESPONSES = [
    "I'm not sure I understand that. Could you rephrase your question? 🤔\n\nI can help with:\n• Finding & applying for jobs\n• Account & profile management\n• Payment questions\n• Platform features\n• Contacting support",
    "That's an interesting question! I might not have the answer right now, but our support team can help. 📞\n\nYou can:\n• Fill out the contact form on this page\n• Email: hello@freelancehub.io\n• Or ask me about common topics!",
    "I'd love to help with that! Could you give me a bit more detail? 💡\n\nHere are some things I'm great at:\n• Job search guidance\n• Registration help\n• Payment information\n• Profile management",
]

FALLBACK_SUGGESTIONS = ["How to find jobs?", "How to register?", "Contact support", "About FreelanceHub"]


# ============================================================
# AI Engine — Intent Detection & Response
# ============================================================
def detect_intent(message: str) -> str:
    """Detect the user's intent from their message using keyword matching."""
    message_lower = message.lower().strip()

    # Score each category
    best_category = None
    best_score = 0

    for category, data in KNOWLEDGE_BASE.items():
        score = 0
        for keyword in data["keywords"]:
            if keyword in message_lower:
                # Longer keyword matches get higher scores
                score += len(keyword.split())
        if score > best_score:
            best_score = score
            best_category = category

    return best_category


def get_ai_response(message: str, user_name: str = "Guest", session_id: str = "default"):
    """Generate an AI response based on the user's message."""
    intent = detect_intent(message)

    if intent:
        data = KNOWLEDGE_BASE[intent]
        reply = random.choice(data["responses"])
        suggestions = data.get("suggestions", [])
        category = intent
    else:
        reply = random.choice(FALLBACK_RESPONSES)
        suggestions = FALLBACK_SUGGESTIONS
        category = "unknown"

    # Personalize if user is logged in
    if user_name and user_name != "anonymous" and user_name != "Guest":
        if intent == "greeting":
            reply = reply.replace("Hello! 👋", f"Hello, {user_name}! 👋")
            reply = reply.replace("Hi there!", f"Hi {user_name}!")
            reply = reply.replace("Hey!", f"Hey {user_name}!")

    # Save to chat history
    try:
        db = SessionLocal()
        chat_record = ChatHistory(
            session_id=session_id,
            user_name=user_name,
            user_message=message,
            bot_response=reply,
            category=category,
        )
        db.add(chat_record)
        db.commit()
        db.close()
    except Exception:
        pass  # Don't fail if DB write fails

    return {
        "reply": reply,
        "suggestions": suggestions,
        "category": category,
        "timestamp": datetime.utcnow().isoformat()
    }


# ============================================================
# API Routes
# ============================================================
@app.get("/")
def root():
    """Health check endpoint."""
    return {
        "status": "online",
        "service": "FreelanceHub AI Agent",
        "version": "2.0.0",
        "timestamp": datetime.utcnow().isoformat()
    }


@app.post("/chat")
async def chat(request: Request):
    """Main chat endpoint — receives a message and returns AI response."""
    try:
        data = await request.json()
        user_message = data.get("message", "").strip()
        user_name = data.get("user", "Guest")
        session_id = data.get("session_id", "default")

        if not user_message:
            return {
                "reply": "Please type a message to get started! 😊",
                "suggestions": ["How to find jobs?", "How to register?", "Contact support"],
                "category": "empty",
                "timestamp": datetime.utcnow().isoformat()
            }

        response = get_ai_response(user_message, user_name, session_id)
        return response

    except Exception as e:
        return {
            "reply": "I'm having a small hiccup. Please try again! 🔄",
            "suggestions": ["Contact support"],
            "category": "error",
            "timestamp": datetime.utcnow().isoformat()
        }


@app.post("/chat/clear")
async def clear_chat(request: Request):
    """Clear chat history for a session."""
    try:
        data = await request.json()
        session_id = data.get("session_id", "default")
        db = SessionLocal()
        db.query(ChatHistory).filter(ChatHistory.session_id == session_id).delete()
        db.commit()
        db.close()
        return {"status": "cleared"}
    except Exception:
        return {"status": "error"}


@app.get("/chat/history/{session_id}")
async def get_history(session_id: str):
    """Retrieve chat history for a session."""
    try:
        db = SessionLocal()
        records = db.query(ChatHistory).filter(
            ChatHistory.session_id == session_id
        ).order_by(ChatHistory.created_at.asc()).limit(50).all()
        history = [
            {
                "user_message": r.user_message,
                "bot_response": r.bot_response,
                "category": r.category,
                "created_at": r.created_at.isoformat() if r.created_at else None
            }
            for r in records
        ]
        db.close()
        return {"history": history}
    except Exception:
        return {"history": []}


# ============================================================
# Run Server
# ============================================================
if __name__ == "__main__":
    print("[OK] FreelanceHub AI Agent starting on http://127.0.0.1:5000")
    uvicorn.run("app:app", host="127.0.0.1", port=5000, reload=True)
